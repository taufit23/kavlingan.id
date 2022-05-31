<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RekeningSistemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_bank' => 'BRI',
            'nama_rekening' => 'Kavlingan.id',
            'nomor_rekening' => 87967865983467
        ];
    }
}