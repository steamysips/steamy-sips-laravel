<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            DistrictSeeder::class,
            ProductSeeder::class,
            PasswordChangeRequestSeeder::class,
            AdministratorSeeder::class,
            ClientSeeder::class,
            ReviewSeeder::class,
            StoreSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
            StoreProductSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
