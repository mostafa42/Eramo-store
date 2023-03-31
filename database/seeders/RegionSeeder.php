<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
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
            'title_ar'=>'التجمع الخامس',
            'title_en'=>'5th Settlement',
            "country_id"=>1,
            "city_id"=>1
            ],

            [
                'title_ar'=>'مدينه نصر',
                'title_en'=>'Nasr City',
                "country_id"=>1,
                "city_id"=>1
                ],

            [
                'title_ar'=>'العالمين',
                'title_en'=>'Alameen',
                "country_id"=>1,
                "city_id"=>2
            ],
            [
                'title_ar'=>'العجمي',
                'title_en'=>'Agami',
                "country_id"=>1,
                "city_id"=>2
            ],


            ];



            foreach($data as $region){
                Region::create($region);
            }

    }
}
