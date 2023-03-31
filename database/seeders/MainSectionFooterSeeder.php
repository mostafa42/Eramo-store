<?php

namespace Database\Seeders;

use App\Models\MainSectionFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSectionFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainSectionFooter::create([
            "logo" => "uploads/user_front/footer/logo.png",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,",
            "google_store_link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M",
            "app_store_link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M"
        ]);
    }
}
