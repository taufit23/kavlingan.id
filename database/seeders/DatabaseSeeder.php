<?php

namespace Database\Seeders;

use App\Models\RekeningSistem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     Data_tanahSeeder::class,
        // ]);
        // \App\Models\User::factory(10)->create();
        RekeningSistem::factory(1)->create();
        // \App\Models\User::factory(10)->create();
    }
}