<?php

namespace Database\Seeders;

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
        // $this->call(UserSeeder::class);
        // $this->call(EstadoSeeder::class);
        $this->call([
            UserSeeder::class,
            EstadoSeeder::class,
            UbicacionSeeder::class,
            // TiposSeeder::class,
            CompraSeeder::class,
          ]);

    }
}
