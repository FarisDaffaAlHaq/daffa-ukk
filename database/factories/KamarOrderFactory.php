<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KamarOrder>
 */
class KamarOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'booking_kode' => mt_rand(100,3000),
            'user_id' => 3,
            'resepsionis_id' => 2,
            'jumlahdibayar' => 2000,
            // 'jumlah_penginap' => 3,
            'tanggal_checkin' => now(),
            'tanggal_checkout' => now(),
            'metodepembayaran' => 'cash',
            'statuspembayaran' => 'lunas',
        ];
    }
}
