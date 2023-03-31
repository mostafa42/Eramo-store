<?php

namespace Database\Seeders;

use App\Models\StoreInformationFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreInformationFooter::create([
            "location" => "Multikart Demo Store, Demo Store India 345-659",
            "phone" => "123-456-7898",
            "email" => "Support@Fiot.Com",
            "fax" => "123456"
        ]);
    }
}
