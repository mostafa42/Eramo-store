<?php

namespace Database\Seeders;

use App\Models\SecondAdvs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecondAdvsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SecondAdvs::create([
            "image" => "uploads/user_front/second_advs/adv1.jfif" ,
            "link" => "https://www.lipsum.com/"
        ]);

        SecondAdvs::create([
            "image" => "uploads/user_front/second_advs/adv2.jfif" ,
            "link" => "https://www.lipsum.com/"
        ]);

        SecondAdvs::create([
            "image" => "uploads/user_front/second_advs/adv3.jfif" ,
            "link" => "https://www.lipsum.com/"
        ]);
    }
}
