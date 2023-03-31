<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                "text_ar"=>"التوصيل في خلال يوم ل 3 ايام",
                "text_en"=>"Delivery within 1 to 3 days",
                "cost"=>100,
                "city_id"=>1,
                "admin_id"=>1,
            ],

            [
                "text_ar"=>"التوصيل في خلال يوم ل 3 ايام",
                "text_en"=>"Delivery within 1 to 3 days",
                "cost"=>200,
                "city_id"=>2,
                "admin_id"=>1,
            ],

            [
                "text_ar"=>"التوصيل في خلال يوم ل 3 ايام",
                "text_en"=>"Delivery within 1 to 3 days",
                "cost"=>200,
                "city_id"=>3,
                "admin_id"=>1,
            ],

            [
                "text_ar"=>"التوصيل في خلال يوم ل 3 ايام",
                "text_en"=>"Delivery within 1 to 3 days",
                "cost"=>200,
                "city_id"=>4,
                "admin_id"=>1,
            ],

            [
                "text_ar"=>"التوصيل في خلال يوم ل 3 ايام",
                "text_en"=>"Delivery within 1 to 3 days",
                "cost"=>100,
                "city_id"=>5,
                "admin_id"=>1,
            ],







        ];



        foreach($data as $shipping){
            Shipping::create($shipping);
        }
    }
}
