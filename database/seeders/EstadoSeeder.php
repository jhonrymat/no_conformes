<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'estado' => 'asignado'
        ]);

        DB::table('estados')->insert([
            'estado' => 'Respuesta'
        ]);

        DB::table('estados')->insert([
            'estado' => 'derrogardo'
        ]);

        DB::table('estados')->insert([
            'estado' => 'cerrado'
        ]);
    }
}
