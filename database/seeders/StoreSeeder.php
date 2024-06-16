<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StoreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('store')->insert([
            ['store_id' => 1, 'phone_no' => '+230 630 1329', 'street' => 'Royal Road', 'district_id' => 1],
            ['store_id' => 2, 'phone_no' => '+230 630 1234', 'street' => 'Angus Road', 'district_id' => 4],
        ]);
    }
}
