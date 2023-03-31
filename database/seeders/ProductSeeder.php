<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Factory::create();

        $productCategories = collect(ProductCategory::whereNotNull('parent_id')->get());
        $taxes = collect(Tax::get());
        for ($i = 0; $i < 100; $i++) {

            $category = $productCategories->random();
            $tax = $taxes->random();
            $data = [
                'title_ar' => $faker->sentence(8),
                'title_en' => $faker->sentence(8),
                'status' => collect(['1','0'])->random(),
                'fake_price' => $faker->numberBetween(100, 2000),
                'real_price' => $faker->numberBetween(100, 2000),
                'purchase_price' => $faker->numberBetween(100, 2000),
                'stock' => $faker->numberBetween(0, 2000),
                'category_id' => $category ? $category->id : null,
                'main_category_id' => $category ? $category->parent_id : null,
                'to' => $faker->unique()->dateTimeBetween('now', '+3 years'),
                'created_at' => $faker->unique()->dateTimeBetween('-3 years', 'now'),
                "admin_id"=>1,

            ];


           $product= Product::create($data);
           if($tax){
            $product->taxes()->attach($tax->id);
           }
        }




    }
}
