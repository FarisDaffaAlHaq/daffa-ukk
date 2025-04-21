<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            'user_id' => 1,
            'kamar_id' => 1,
            'kodebooking' => mt_rand(100,15000),
            'jumlah_penginap' => 5,
            'tanggal_rencanacheckin' => now(),
            'tanggal_rencanacheckout' => now(),
            'totalharga' => 450000,
            'lama_menginap' => 3,
            'dp_dibayar' => null,
            'status' =>'confirmed',
        ]);
    }
}
