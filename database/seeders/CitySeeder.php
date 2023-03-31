<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
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
            'title_ar'=>'القاهره',
            'title_en'=>'Cairo',
            "country_id"=>1
            ],
            [
            'title_ar'=>'الاسكندريه',
            'title_en'=>'Alexandria',
            "country_id"=>1
            ],

            [
            'title_ar'=>'جده',
            'title_en'=>'Jeddah',
            "country_id"=>2
            ],

            [
                'title_ar'=>'الرياض',
                'title_en'=>'Riyadh',
                "country_id"=>2
            ],


            [
                'title_ar'=>'دبي',
                'title_en'=>'Dubai',
                "country_id"=>3
            ],

            [
                'title_ar'=>'ابوظبي',
                'title_en'=>'Abu Dhabi',
                "country_id"=>3
            ],



            ];


        // City::insert($data);

            foreach($data as $city){
                City::create($city);
            }

    }
}
