<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 3,
            'kamar_id' => 2,
            'kodebooking' => mt_rand(1000,10000),
            'jumlah_penginap' => 3,
            'tanggal_rencanacheckin' => now(),
            'tanggal_rencanacheckout' => now(),
            'totalharga' => 300000,
            'lama_menginap' =>2,
            'dp_dibayar' => null,
            'status' => 'confirmed',
        ];
    }
}
