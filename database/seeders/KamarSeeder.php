<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kamars')->insert([
            'nokamar' => mt_rand(100,2000),
            'tipe_kamars_id' => 1,
            'jumlahorangperkamar' => 3,
            'status' => 'tersedia',
            'hargakamarpermalam' => 150000,
            'image' => 'image/hotell.jpeg',
        ]);
    }
}
