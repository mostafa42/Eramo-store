<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Factory::create();

        $contacts =[];


        for($x =1;$x <= 500; $x++){



            $contact =[
                'name'=>$faker->unique()->name(),
                'email'=>$faker->unique()->email(),
                'created_at'=>$faker->dateTimeBetween('-3 years' , 'now'),
                'phone'=>$faker->unique()->phoneNumber(),
                'read'=>collect(['1','0'])->random(),
                'message'=> $faker->sentence(20),
                'subject'=> $faker->sentence(2),
                'ip_address'=>$faker->unique()->ipv4(),

            ];


            $contacts[] =$contact;

        };


        $chunks = array_chunk($contacts, 50);


        foreach ($chunks as $chunk) {
            ContactMessage::insert($chunk);
        }
    }

}
