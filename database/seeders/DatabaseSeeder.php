<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Booking::factory(10)->create();
        \App\Models\Fasilitas::factory(10)->create();
        \App\Models\FasilitasKamar::factory(10)->create();
        \App\Models\FasilitasUmum::factory(10)->create();
        \App\Models\Kamar::factory(10)->create();
        \App\Models\KamarOrder::factory(10)->create();
        \App\Models\TipeKamar::factory(10)->create();
        \App\Models\Saran::factory(10)->create();
    }
}
