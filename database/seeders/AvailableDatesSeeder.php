<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AvailableDate;


class AvailableDatesSeeder extends Seeder
{
    public function run()
    {
        // Voeg enkele testdatums toe
        AvailableDate::create(['date' => '2023-12-01', 'time' => '09:00:00']);
        AvailableDate::create(['date' => '2023-12-01', 'time' => '13:00:00']);
        AvailableDate::create(['date' => '2023-12-02', 'time' => '10:30:00']);
        // Voeg meer datums toe zoals nodig
    }
}
