<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
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
                "title"=>'AllAmount',
                "from"=>"2023-01-01",
                "to"=>"2024-01-01",

                "value"=>100,
                "type"=>"amount",
                "admin_id"=>1,

            ],
            [
                "title"=>'AllPercent10',
                "from"=>"2023-01-01",
                "to"=>"2024-01-01",
                  "value"=>10,
                "type"=>"percent",
                "admin_id"=>1,

            ],

        ];



        foreach($data as $promo){
            PromoCode::create($promo);
        }
    }
}
