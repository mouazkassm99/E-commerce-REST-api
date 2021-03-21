<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Database\Factories\CartFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private int $numberOFUsers = 10;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

        User::factory()->count($this->numberOFUsers)->create();
        $this->call(RoleSeeder::class);
        Product::factory()->count(20)->create();
        Cart::factory()->count($this->numberOFUsers )->create();
        $this->call(CartProductSeeder::class);
    }
}
