<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker =Factory::create();

        $users =[];
        $cities= collect(City::get());




        for($x =1;$x <= 500; $x++){
            $city = $cities->random();
            $name = $faker->unique()->name();
            $email = $faker->unique()->email();
            $created_at = $faker->unique()->dateTimeBetween('-3 years' , 'now');
            $password = $faker->unique()->password();
            $phone = $faker->unique()->phoneNumber();
            $gender = collect(['male','female'])->random();
            $sign_from = collect(['web', 'android','ios','mobile'])->random();

            $user =[
                'name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
                'created_at'=>$created_at,
                'password'=>Hash::make($password),
                'gender'=>$gender,
                'sign_from'=>$sign_from,
                'country_id'=> $city->country_id,
                'city_id'=> $city->id,
            ];


            $users[] =$user;

        };


        $chunks = array_chunk($users, 50);


        foreach ($chunks as $chunk) {
            User::insert($chunk);
        }

    }
}
