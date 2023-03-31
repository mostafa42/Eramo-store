<?php

namespace Database\Seeders;

use App\Models\OurFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OurFeature::truncate() ;

        OurFeature::create([
            "icon" => "uploads/user_front/our_features/feature1.jfif" ,
            "title" => "Free Shipping" ,
            "sub_title" => "Free Shipping World Wide"
        ]);

        OurFeature::create([
            "icon" => "uploads/user_front/our_features/feature2.jfif" ,
            "title" => "24 X 7 Service" ,
            "sub_title" => "Online Service For 24 X 7"
        ]);

        OurFeature::create([
            "icon" => "uploads/user_front/our_features/feature3.jfif" ,
            "title" => "Festival Offer" ,
            "sub_title" => "Super Sale Upto 50% Off"
        ]);

        OurFeature::create([
            "icon" => "uploads/user_front/our_features/feature4.jfif" ,
            "title" => "Online Pay" ,
            "sub_title" => "Online Payment Avaible"
        ]);
    }
}
