<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData():array
    {
        $faker = Factory::create('ru_RU');

        $categories = DB::select('SELECT id FROM categories');

        $data = [];
        for ($i=0; $i < 10; $i++){
            $data[]=[
                'title' => $faker->sentence(mt_rand(3,10)),
                'short_description' => $faker->realText(50),
                'description' => $faker->realText(200),
                'image' => $faker->imageUrl(),
                'category_id' => $categories[array_rand($categories)]->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
