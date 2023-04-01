<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate() ;
        $data =[
            'name'=>'Super Admin',
            'email'=>'super_admin@gmail.com',
            'password'=>Hash::make(12345678),
            'status'=>1,
        ];
        $admin =   Admin::create($data);
        $admin->attachRole('super-admin');




        $faker =Factory::create();

        $genders =['male','female'];

        for($x =1;$x <= 50; $x++){

            $name = $faker->unique()->name();
            $email = $faker->unique()->email();
            $created_at = $faker->unique()->dateTimeBetween('-3 years' , 'now');
            $password = $faker->unique()->password();
            $phone = $faker->unique()->phoneNumber();
            $gender = collect($genders)->random();


            $user =[
                'name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
                'created_at'=>$created_at,
                'password'=>Hash::make($password),
                'gender'=>$gender
            ];


             $admin =Admin::create( $user);
            $admin->attachRole('admin');


        };

    }



}
