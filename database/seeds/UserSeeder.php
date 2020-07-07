<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name' => 'cesar',
            'email' => 'cesar@test.com',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
