<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'samsung mobile',
            'price'=>'500',
            'description'=>'a smart phone that has 4gigs of RAM and can fly you to the moon',
            'category'=>'mobile',
            'gallery'=>'https://i.gadgets360cdn.com/products/large/1555507135_635_samsung_galaxy_a60.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name'=>'samsung mobile',
            'price'=>'600',
            'description'=>'a foldable smart phone that has 8gigs of RAM and a strong processor',
            'category'=>'mobile',
            'gallery'=>'https://www.slashgear.com/wp-content/uploads/2019/10/samsung-clamshell-foldable-1-1280x720.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name'=>'apple mobile',
            'price'=>'1000',
            'description'=>'a smart phone that has 3gigs of RAM and will look very fancy on you',
            'category'=>'mobile',
            'gallery'=>'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-12-pro-max-gold-hero?wid=1200&hei=630&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1604021660000',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

//        DB::table('product')->insert([
//            'name'=>'samsung mobile',
//            'price'=>'500',
//            'description'=>'a smart phone that has 4gigs of RAM and can fly you to the moon',
//            'category'=>'mobile',
//            'gallery'=>'https://i.gadgets360cdn.com/products/large/1555507135_635_samsung_galaxy_a60.jpg',
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
    }
}
