<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<20;$i++){
            $cart = Cart::inRandomOrder()->first();
            $product = Product::inRandomOrder()->first();

            DB::table('cart_product')->insert([
                'cart_id' => $cart->id,
                'product_id'=> $product->id,
                'quantity'=> rand(1, 5),
            ]);
        }
    }
}
