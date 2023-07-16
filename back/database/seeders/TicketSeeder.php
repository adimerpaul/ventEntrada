<?php

namespace Database\Seeders;

use App\Models\Cartelera;
use App\Models\Seats;
use App\Models\Ticket;
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
        $carteleras = Cartelera::all();
        foreach ($carteleras as $cartelera){
            $letras = array('', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB');
            $sala = $cartelera->sala;
            $price = $cartelera->price;
            $movie = $cartelera->movie;
            $seats = Seats::where('sala_id',$sala->id)->get();
            foreach ($seats as $seat){
                error_log(json_encode($seat));
//                $numBoleto = Ticket::where('cartelera_id', $cartelera->id)->count() + 1;
                $ticket = new Ticket();
                $ticket->numboc = '';
                $ticket->numero = '';
                $ticket->fecha = date('Y-m-d');
                $ticket->fechaVencimiento = date('Y-m-d H:i:s', strtotime('+30 minutes'));
                $ticket->numeroFuncion = $cartelera->nroFuncion;
                $ticket->nombreSala = $sala->nombre;
                $ticket->serieTarifa = $price->serie;
                $ticket->fechaFuncion = $cartelera->fecha;
                $ticket->horaFuncion = $cartelera->horaInicio;
                $ticket->fila = $seat->fila;
                $ticket->columna = $seat->columna;
                $ticket->letra = $letras[$seat->fila];
                $ticket->costo = $price->precio;
                $ticket->titulo = $movie->title;
                $ticket->promo = false;
                $ticket->devuelto = '';
                $ticket->idCupon = '';
                $ticket->movie_id = $movie->id;
                $ticket->estado = $seat->activo=='ACTIVO'?'DISPONIBLE':'NO DISPONIBLE';
                $ticket->user_id = '1'; // '1' es el id del usuario admin
                $ticket->cartelera_id = $cartelera->id;
                $ticket->save();
            }
        }
//        DB::table('tickets')->insert([
//            [
//                'numboc' => '1',
//                'numero' => '1',
//                'fecha' => '2021-06-11',
//                'numeroFuncion' => '1',
//                'nombreSala' => 'Sala 1',
//                'serieTarifa' => '1',
//                'fechaFuncion' => '2021-06-11',
//                'horaFuncion' => '2021-06-11 10:00:00',
//                'fila' => '1',
//                'columna' => '16',
//                'letra' => 'A',
//                'costo' => '1',
//                'titulo' => '1',
//                'promo' => '1',
//                'devuelto' => '1',
//                'idCupon' => '1',
//                'movie_id' => '1',
//                'estado' => 'OCUPADO',
//                'user_id' => '1',
//                'cartelera_id' => '2',
//                'price_id' => '1',
//                'sala_id' => '1',
//            ]
//        ]);
    }
}
