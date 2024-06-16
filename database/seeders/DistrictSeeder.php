<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('district')->insert([
            ['district_id' => 4, 'name' => 'Black River'],
            ['district_id' => 3, 'name' => 'Flacq'],
            ['district_id' => 6, 'name' => 'Grand Port'],
            ['district_id' => 1, 'name' => 'Moka'],
            ['district_id' => 8, 'name' => 'Pamplemousses'],
            ['district_id' => 9, 'name' => 'Plaines Wilhems'],
            ['district_id' => 2, 'name' => 'Port Louis'],
            ['district_id' => 7, 'name' => 'Riviere du Rempart'],
            ['district_id' => 5, 'name' => 'Savanne'],
        ]);
    }
}
