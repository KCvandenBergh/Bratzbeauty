<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Kency',
            'last_name'=>'Sanches Da Veiga',
            'email' => 'itsbratzbeauty@gmail.com',
            'password' => Hash::make('PsQhBL)vG7L!'),
            'role' => 'admin',
        ]);
    }
}
