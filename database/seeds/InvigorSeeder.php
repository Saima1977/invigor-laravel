<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class InvigorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $f = Faker::create();
        foreach (range(1,100) as $index) 
        {
            DB::table('invigors')->insert([
                'image_name' => str_random(6).".png",
                'name' => str_random(10),
                'price' => "$".round(rand(5, 100) + (rand(0, 99) / 10), 2)."0",
                'description' => $f->sentence(8)
            ]);
        }
    }
}