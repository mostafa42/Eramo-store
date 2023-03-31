<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::create([
            "facebook" => "https://www.youtube.com/watch?v=JlPVp_ZcsKM",
            "linkedIn" => "https://www.youtube.com/watch?v=JlPVp_ZcsKM",
            "instegram" => "https://www.youtube.com/watch?v=JlPVp_ZcsKM",
            "address" => "xyz",
            "email" => "ejhfjshnkjfkajdksjkfjdaskjj@jdkjfkjdfkjkfjkdf.com",
            "phone1" => '01121238817',
            "phone2" => '01121238818',
        ]);
    }
}