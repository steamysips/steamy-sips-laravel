<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StoreProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('store_product')->insert([
            ['store_id' => 1, 'product_id' => 1, 'stock_level' => 3],
            ['store_id' => 1, 'product_id' => 2, 'stock_level' => 5439],
            ['store_id' => 1, 'product_id' => 3, 'stock_level' => 54],
            ['store_id' => 1, 'product_id' => 4, 'stock_level' => 38],
            ['store_id' => 1, 'product_id' => 5, 'stock_level' => 998],
            ['store_id' => 2, 'product_id' => 1, 'stock_level' => 22],
            ['store_id' => 2, 'product_id' => 3, 'stock_level' => 13],
            ['store_id' => 2, 'product_id' => 4, 'stock_level' => 12],
        ]);
    }
}
