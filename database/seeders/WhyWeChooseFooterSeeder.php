<?php

namespace Database\Seeders;

use App\Models\WhyWeChooseFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyWeChooseFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhyWeChooseFooter::create([
            "title_ar" => "Link 5",
            "title_en" => "Link 5",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        WhyWeChooseFooter::create([
            "title_ar" => "Link 6",
            "title_en" => "Link 6",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        WhyWeChooseFooter::create([
            "title_ar" => "Link 7",
            "title_en" => "Link 7",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        WhyWeChooseFooter::create([
            "title_ar" => "Link 8",
            "title_en" => "Link 8",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);
    }
}
