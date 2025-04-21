<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nokamar' => mt_rand(100,2000),
            'tipe_kamars_id' => 1,
            'jumlahorangperkamar' => 5,
            'status' => 'tersedia',
            'hargakamarpermalam' => 150000,
            'image' => 'image/hotell.jpeg',
        ];
    }
}
