<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        //
        DB::table('products')->insert([
            [
                "name"=>"Oppo mobile",
                "price"=>"300",
                "description"=>"A smartphone with 8GB RAM and much more feature",
                "category"=>"mobile",
                "gallery"=>"https://www.91-img.com/pictures/143799-v6-oppo-reno-6-mobile-phone-large-1.jpg?tr=q-80"
            ],
            [
                "name"=>"Panasonic TV",
                "price"=>"400",
                "description"=>"A smart tv with much more feature",
                "category"=>"tv",
                "gallery"=>"https://www.lg.com/in/images/tvs/md07511882/thumbnail/32LM565BPTA-350-02.jpg"
            ],
            [
                "name"=>"Sony TV",
                "price"=>"500",
                "description"=>"A smart tv with much more feature",
                "category"=>"tv",
                "gallery"=>"https://www.lg.com/in/images/tvs/md06117716/thumbnail/04_350-thumbnail-Animatoin.jpg"
            ],
            [
                "name"=>"LG fridge",
                "price"=>"200",
                "description"=>"A fridge with much more feature",
                "category"=>"fridge",
                "gallery"=>"https://images.samsung.com/is/image/samsung/assets/id/p6_gro1/p6_initial_pcd/p6_initial_refrigerators/Ref_PCD-Category-browser4-Single-Door.jpg?$140_140_JPG$"
            ]
        ]);
    }
}
