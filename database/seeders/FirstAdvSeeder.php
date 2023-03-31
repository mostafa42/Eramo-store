<?php

namespace Database\Seeders;

use App\Models\FirstAdv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstAdvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FirstAdv::truncate() ;

        FirstAdv::create([
            "main_image" => "uploads/user_front/first_advs/adv1.jfif",
            "small_text" => "small text",
            "big_text" => "big text",
            "link" => "https://www.lipsum.com/"
        ]);

        FirstAdv::create([
            "main_image" => "uploads/user_front/first_advs/adv2.jfif",
            "small_text" => "small text",
            "big_text" => "big text",
            "link" => "https://www.lipsum.com/"
        ]);

        FirstAdv::create([
            "main_image" => "uploads/user_front/first_advs/adv3.jfif",
            "small_text" => "small text",
            "big_text" => "big text",
            "link" => "https://www.lipsum.com/"
        ]);
    }
}
