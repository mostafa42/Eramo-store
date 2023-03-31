<?php

namespace Database\Seeders;

use App\Models\ProductTopAdv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTopAdvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTopAdv::create([
            "main_image" => "uploads/user_front/product_page/main.jpg",
            "link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M" ,
            "title" => "BIGGEST DEALS ON TOP BRANDS",
            "description" => "The trick to choosing the best wear for yourself is to keep in mind your body type, individual style, occasion and also the time of day or weather. In addition to eye-catching products from top brands, we also offer an easy 30-day return and exchange policy, free and fast shipping across all pin codes, cash or card on delivery option, deals and discounts, among other perks. So, sign up now and shop for westarn wear to your heart’s content on Multikart."
        ]);
    }
}
