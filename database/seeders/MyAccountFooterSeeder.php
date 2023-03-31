<?php

namespace Database\Seeders;

use App\Models\MyAccountSectionFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyAccountFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyAccountSectionFooter::create([
            "title_ar" => "Link1",
            "title_en" => "Link1",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        MyAccountSectionFooter::create([
            "title_ar" => "Link2",
            "title_en" => "Link2",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        MyAccountSectionFooter::create([
            "title_ar" => "Link3",
            "title_en" => "Link3",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);

        MyAccountSectionFooter::create([
            "title_ar" => "Link4",
            "title_en" => "Link4",
            "link_ar" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8",
            "link_en" => "https://www.youtube.com/watch?v=RIK0Sel-ZB8"
        ]);
    }
}
