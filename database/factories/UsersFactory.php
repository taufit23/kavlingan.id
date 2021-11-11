<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => $this->faker->name,
            'tempat_tanggal_lahir' => $this->faker->streetName . ',' . Carbon::now(),
            'agama' => 1 or 2 or 3 or 4 or 5 or 6,
            'jenis_kelamin' => 'lk' or 'pr',
            'no_ktp' => $this->faker->creditCardNumber,
            'pekerjaan' => $this->faker->text($maxNbChars = 10),
            'alamat_kerja' => $this->faker->address,
            'nama_ibu' => $this->faker->name,
            'alamat' => $this->faker->address,
            'email' => $this->faker->freeEmail,
            'no_hp' => $this->faker->phoneNumber,
            'password' => 123,
            'role' => 'Penjual' or 'Pembeli',
            'avatar' => '/images/user_profil/dummyavatar.jpg',
            'foto_ktp' => '/images/ktp_profil/dummyktp.jpg',
            'bio' => null,
        ];
    }
}