<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VKUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ED',
            'email' => 'eduardilgen@gmail.com',
            'password' => Hash::make('ED'),
            'is_admin' => false,
        ]);
    }
}
