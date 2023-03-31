<?php

namespace Database\Seeders;

use App\Models\ProductUnderAdv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUnderAdvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductUnderAdv::create([
            "image" => "uploads/user_front/product_page/main.jpg" ,
            "link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M"
        ]);
    }
}
