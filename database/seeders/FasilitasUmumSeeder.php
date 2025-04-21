<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fasilitas_umums')->insert([
            'nama_fasilitas' => 'Kolam Renang',
            'deskripsi' => 'Kolam Renang sebagai Sarana Olahraga',
            'status'=>'tersedia',
        ]);
        DB::table('fasilitas_umums')->insert([
            'nama_fasilitas' => 'Wifi Gratis',
            'deskripsi' => 'untuk bermain game dan mengerjakan tugas',
            'status'=>'tersedia',
        ]);
    }
}
