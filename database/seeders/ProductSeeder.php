<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product')->insert([
            ['product_id' => 1, 'name' => 'Espresso', 'calories' => 5, 'img_url' => 'espresso.webp', 'img_alt_text' => 'Espresso in a white cup. Source: Dolce Gusto', 'category' => 'Espresso', 'price' => 2.99, 'description' => 'A strong and concentrated coffee drink.'],
            ['product_id' => 2, 'name' => 'Cappuccino', 'calories' => 120, 'img_url' => 'cappuccino.webp', 'img_alt_text' => 'Close-up of a steaming cup of freshly brewed Espresso with frothy milk on top. Source: Discount Coffee', 'category' => 'Cappuccino', 'price' => 4.99, 'description' => 'An Italian coffee drink made with espresso, hot milk, and steamed milk foam.'],
            ['product_id' => 3, 'name' => 'Caffè Latte', 'calories' => 190, 'img_url' => 'latte.avif', 'img_alt_text' => "A latte with a spoon. Source: Peet's Coffee.", 'category' => 'Latte', 'price' => 3.99, 'description' => 'A coffee drink made with espresso and steamed milk.'],
            ['product_id' => 4, 'name' => 'Caffè Americano', 'calories' => 15, 'img_url' => 'americano.webp', 'img_alt_text' => "Close-up of a clear glass mug filled with hot, black Americano coffee, topped with a thin layer of creme. Source: Peet's Coffee.", 'category' => 'Americano', 'price' => 3.49, 'description' => 'A coffee drink prepared by diluting espresso with hot water.'],
            ['product_id' => 5, 'name' => 'Caffè Mocha', 'calories' => 370, 'img_url' => 'mocha.png', 'img_alt_text' => 'Rich and indulgent mocha served in a ceramic mug, topped with whipped cream and a dusting of cocoa powder. Source: Starbucks', 'category' => 'Mocha', 'price' => 4.49, 'description' => 'A chocolate-flavored variant of a latte, often with whipped cream on top.'],
            ['product_id' => 6, 'name' => 'White Chocolate Mocha', 'calories' => 390, 'img_url' => 'white-chocolate-mocha.png', 'img_alt_text' => 'Rich and indulgent mocha served in a ceramic mug, topped with whipped cream and a dusting of cocoa powder. Source: Starbucks', 'category' => 'Mocha', 'price' => 5.69, 'description' => 'Our signature mocha meets white chocolate sauce and steamed milk, and then is finished off with sweetened whipped cream to create this supreme white chocolate delight.'],
            ['product_id' => 7, 'name' => 'Cinnamon Dolce Latte', 'calories' => 340, 'img_url' => 'cinnamon-dolce-latte.webp', 'img_alt_text' => 'Steamed milk and cinnamon dolce-flavored syrup on Latte. Source: Starbucks ', 'category' => 'Latte', 'price' => 7.88, 'description' => 'We add freshly steamed milk and cinnamon dolce-flavored syrup to our classic espresso, topped with sweetened whipped cream and a cinnamon dolce topping to bring you specialness in a treat.'],
            ['product_id' => 8, 'name' => 'Caramel Macchiato', 'calories' => 250, 'img_url' => 'caramel-macchiato.png', 'img_alt_text' => 'Freshly steamed milk with vanilla-flavored syrup marked with espresso and topped with a caramel drizzle for an oh-so-sweet finish. Source: Starbucks', 'category' => 'Macchiato', 'price' => 3.33, 'description' => 'Freshly steamed milk with vanilla-flavored syrup marked with espresso and topped with a caramel drizzle for an oh-so-sweet finish.'],
            ['product_id' => 9, 'name' => 'Espresso Macchiato', 'calories' => 15, 'img_url' => 'espresso-macchiato.png', 'img_alt_text' => 'Our rich espresso marked with dollop of steamed milk and foam. A European-style classic. Source: Starbucks', 'category' => 'Macchiato', 'price' => 8.85, 'description' => 'Our rich espresso marked with dollop of steamed milk and foam. A European-style classic.'],
            ['product_id' => 10, 'name' => 'Espresso Con Panna', 'calories' => 35, 'img_url' => 'espresso-con-panna.webp', 'img_alt_text' => 'Espresso meets a dollop of whipped cream to enhance the rich and caramelly flavors of a straight-up shot. Source: Starbucks', 'category' => 'Espresso', 'price' => 4.34, 'description' => 'Espresso meets a dollop of whipped cream to enhance the rich and caramelly flavors of a straight-up shot.'],
        ]);
    }
}
