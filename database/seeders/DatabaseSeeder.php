<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(LaratrustSeeder::class);

        $this->call(AdminSeeder::class);
        $this->call(ContactMessageSeeder::class);
        $this->call(TaxSeeder::class);
        $this->call(PromoCodeSeeder::class);

        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RegionSeeder::class);

        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderSeeder::class);







    }
}
