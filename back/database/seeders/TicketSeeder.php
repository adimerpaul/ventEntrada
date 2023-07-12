<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'numboc' => '1',
                'numero' => '1',
                'fecha' => '2021-06-11',
                'numeroFuncion' => '1',
                'nombreSala' => 'Sala 1',
                'serieTarifa' => '1',
                'fechaFuncion' => '2021-06-11',
                'horaFuncion' => '2021-06-11 10:00:00',
                'fila' => '1',
                'columna' => '16',
                'letra' => 'A',
                'costo' => '1',
                'titulo' => '1',
                'promo' => '1',
                'devuelto' => '1',
                'idCupon' => '1',
                'movie_id' => '1',
                'estado' => '1',
                'user_id' => '1',
                'cartelera_id' => '2',
                'price_id' => '1',
                'sala_id' => '1',
            ]
        ]);
    }
}
