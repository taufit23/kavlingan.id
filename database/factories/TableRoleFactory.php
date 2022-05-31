<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TableRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'nama_role' => 'Admin',
                'deskripsi_role' => 'Admin',
            ],
        ];
    }
}