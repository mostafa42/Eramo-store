<?php

namespace Database\Seeders;

use App\Models\MainSlider;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainSlider::create([
            "main_image" => "field175959_1920.jpg",
            "intro_title" => "This is first slider",
            "big_text" => "This is Slider 1",
            "description" => "An ode to the Earth's artistry, watch how these marvels come alive with diamonds, rubies, tanzanite, citrines, emeralds, rubellite, sapphires ",
            "link" => "https://www.skynewsarabia.com/varieties"
        ]);
    }
}
