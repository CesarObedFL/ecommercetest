<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        //$this->call(ProductSeeder::class);
        
        $products = factory(App\Product::class,10)->create();
        $image = public_path('storage/image/default.jpg');
        foreach($products as $product){
            $product->addMedia($image)->preservingOriginal()->toMediaCollection('images');
        }
    }
}
