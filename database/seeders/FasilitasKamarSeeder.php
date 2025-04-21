<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fasiltas_kamars')->insert([
            'kamar_id' => 1,
            'fasilitas_id' => 1,
        ]);
        DB::table('fasiltas_kamars')->insert([
            'kamar_id' => 1,
            'fasilitas_id' => 2,
        ]);
    }
}
