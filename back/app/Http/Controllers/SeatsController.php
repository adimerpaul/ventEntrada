<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Models\Seats;
use App\Http\Requests\StoreSeatsRequest;
use App\Http\Requests\UpdateSeatsRequest;
use App\Models\Ticket;

class SeatsController extends Controller{
    public function index(){
        $seats = Seats::all();
        return view('seats.index', compact('seats'));
    }
    public function seatsSearch($catelera_id){
        $catelera = Cartelera::find($catelera_id);
        $salas = $catelera->sala;
        $seats = Seats::where('sala_id', $salas->id)->get();
        foreach ($seats as $seat) {
            $ticket = Ticket::where('cartelera_id', $catelera_id)
                ->where('fila', $seat->fila)
                ->where('columna', $seat->columna)->first();
            if ($ticket) {
                $seat->activo = 'OCUPADO';
            }
        }
        return $seats;
    }
}
