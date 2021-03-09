<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData():array
    {
        $faker = Factory::create('ru_RU');

        $data = [];
        for ($i=0; $i < 10; $i++){
            $data[]=[
                'link' => $faker->text(20),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
