<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'                  => $this->faker->name($gender = null|'male'|'female'),
            'tempat_tanggal_lahir'  => $this->faker->city() . ',' . $this->faker->date($format = 'Y-m-d', $max = '1990'),
            'agama'                 => $this->faker->unique()->numberBetween($min = 1, $max = 6),
            'jenis_kelamin'         => 'lk' or 'pr',
            'no_ktp'                => $this->faker->unique()->numberBetween($min = 1, $max = 16),
            'pekerjaan'             => $this->faker->jobTitle(),
            'alamat_kerja'          => $this->faker->address(),
            'nama_ibu'              => $this->faker->name($gender = null|'male'|'female'),
            'alamat'                => $this->faker->address(),
            'email'                 => $this->faker->email(),
            'no_hp'                 => $this->faker->phoneNumber(),
            'password'              => 123,
            'role'                  => 'Pembeli' or 'Penjual',
            'status'                => null or 0 or 1,
            'avatar'                => 'a',
            'foto_ktp'              => 'a',
            'bio'                   => 'a',
            'remember_token'        => 'a',
        ];
    }
}
