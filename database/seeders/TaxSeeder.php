<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
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
                "title_ar"=>"ضريبه القيمه المضافه",
                "title_en"=>"Value added tax",
                "percentage"=>14,
                "admin_id"=>1,

            ],

            [
                "title_ar"=>"ضريبة على المستوردات",
                "title_en"=>"A tax on imports",
                "percentage"=>10,
                "admin_id"=>1,

            ],





        ];



        foreach($data as $tax){
            Tax::create($tax);
        }
    }
}
