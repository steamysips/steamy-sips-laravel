<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    use HasFactory;

    protected $primaryKey = 'store_id';
    protected $fillable = ['phone_no', 'street', 'city', 'districts', 'coordinate'];

    // retrieve the coordinate as a readable format (latitude and longitude)
    protected $geometry = ['coordinate'];
    protected $geometryAsText = true;

    /**
     * Convert the POINT data type to readable latitude and longitude
     */
    public function getCoordinateAttribute($value)
    {
        if ($value) {
            $point = str_replace(['POINT(', ')'], '', $value);
            $coordinates = explode(' ', $point);
            if (count($coordinates) === 2) {
                list($longitude, $latitude) = $coordinates;
                return [
                    'latitude' => (float) $latitude,
                    'longitude' => (float) $longitude
                ];
            }
        }
        return null;
    }

    /**
     * Store the latitude and longitude as a POINT in the database
     */
    public function setCoordinateAttribute($value)
    {
        if (is_array($value) && isset($value['latitude'], $value['longitude'])) {
            $this->attributes['coordinate'] = DB::raw("ST_GeomFromText('POINT({$value['longitude']} {$value['latitude']})')");
        } else {
            $this->attributes['coordinate'] = null;
        }
    }

    /**
     * Override the default query to handle POINT fields as text
     */
    public function newQuery($excludeDeleted = true)
    {
        if (!empty($this->geometry) && $this->geometryAsText === true) {
            $raw = '';
            foreach ($this->geometry as $column) {
                $raw .= 'AsText(`' . $this->table . '`.`' . $column . '`) as `' . $column . '`, ';
            }
            $raw = substr($raw, 0, -2); // Remove the trailing comma

            return parent::newQuery($excludeDeleted)->addSelect('*', DB::raw($raw));
        }

        return parent::newQuery($excludeDeleted);
    }

    /**
     * many-to-many relationship: a store can have multiple products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_store', 'store_id', 'product_id');
    }
}
