<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
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
            'title_ar'=>'مصر',
            'title_en'=>'Egypt',
            'shortcut'=>'EG',
            'code'=>'+20',
            ],
               [
            'title_ar'=>'المملكه العربيه السعوديه',
            'title_en'=> "Kingdom of Saudi Arabia",
            'shortcut'=>'KSA',
            'code'=>'+966',
            ],

            [
            'title_ar'=>'الإمارات العربية المتحدة',
            'title_en'=>'United Arab Emirates',
            'shortcut'=>'UAE',
            'code'=>'+971',
            ],

            ];



        // Country::insert($data);
            foreach($data as $country){
                Country::create($country);
            }

    }
}
