<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $products = collect(Product::get());
        $cities = collect(City::get());
        $users = collect(User::get());

        for ($i = 0; $i < 100; $i++) {

            $randomProducts = $products->random(collect([1,2,3,4,5,6])->random());
            $city = $cities->random();
            $user = $users->random();

            $data = [
                'promo_id' =>collect([1,2])->random(),
                'order_from' =>collect(['web','ios','android'])->random(),
                'shipping_id' =>collect([1,2,3,4,5])->random(),
                'user_id' => $user ? $user->id : null,
                'customer_name' => $user ? $user->name : null,
                'customer_email' => $user ? $user->email : null,
                'customer_phone' => $user ? $user->phone : null,
                'address_from_user' =>$faker->unique()->sentence(8),
                'comment' =>$faker->unique()->sentence(8),
                'custom_address_from_admin' =>$faker->unique()->sentence(8),
                'city_id' => $city ? $city->id : null,
                'country_id' => $city ? $city->country_id  : null,
                'created_at' => $faker->unique()->dateTimeBetween('-3 years', 'now'),

            ];


           $order= Order::create($data);


           $total_products_price = 0;
           $total_products_taxes = 0;
           $total_products_price_with_taxes = 0;

           $items = [];
           $quantities = collect([1,2,3]);
           foreach ( $randomProducts as $product) {

            $quantity = $quantities->random();

            $items[$product->id] = [
                'price' => $product->real_price,
                'quantity' => $quantity,
                'total' => $product->price_after_taxes * $quantity,
                'taxes' => $product->price_after_taxes - $product->real_price,
            ];

            $total_products_price += $product->real_price * $quantity;
            $total_products_taxes += ($product->price_after_taxes - $product->real_price)  * $quantity;
            $total_products_price_with_taxes += $product->price_after_taxes * $quantity;

           }

           $order->products()->attach($items);
           $order->total_products_price = $total_products_price;
           $order->total_products_taxes = $total_products_taxes;
           $order->total_products_price_with_taxes = $total_products_price_with_taxes;

           $order->save();
           $order->generateUniqueOrderNumber();
           $order->calcPromoCode();
           $order->calcShipping();
           $order->calcOrderTotalSum();
           $order->save();


        }
    }
}
