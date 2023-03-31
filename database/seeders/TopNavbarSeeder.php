<?php

namespace Database\Seeders;

use App\Models\TopNavbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopNavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TopNavbar::create([
            "welcome_to" => "Mostafa Gamal App",
            "deliver_in" => "24 Day",
            "code" => "Hello123"
        ]);
    }
}
