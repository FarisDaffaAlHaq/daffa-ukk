<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kamar_orders')->insert([
            'booking_kode' => mt_rand(100,3000),
            'tanggal_checkin' => now(),
            'tanggal_checkout' => date('d-m-Y'),
            'jumlahdibayar' => 740000,
            'metodepembayaran' => 'cash',
            'statuspembayaran' => 'lunas',
            'user_id' => 3,
            'resepsionis_id' => 2,
        ]);
    }
}
