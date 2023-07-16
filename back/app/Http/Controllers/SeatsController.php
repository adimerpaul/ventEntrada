<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Models\Seats;
use App\Http\Requests\StoreSeatsRequest;
use App\Http\Requests\UpdateSeatsRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class SeatsController extends Controller{
    public function index(){
        $seats = Seats::all();
        return view('seats.index', compact('seats'));
    }
    public function seatsSearch($catelera_id, Request $request){
        $tickets = Ticket::where('cartelera_id', $catelera_id)->get();
        foreach ($tickets as $ticket) {
            $t=Ticket::find($ticket->id);
            if ($t->fechaVencimiento<=date('Y-m-d H:i:s') && $t->estado=='RESERVADO SIN PAGAR'){
                $t->estado='DISPONIBLE';
                $t->user_id=null;
                $t->fechaVencimiento=null;
                $t->save();
            }
            if ($t->user_id == $request->user()->id && $t->estado == 'RESERVADO SIN PAGAR') {
                $t->estado = 'DISPONIBLE';
                $t->save();
            }
        }

        $tickets = Ticket::where('cartelera_id', $catelera_id)->get();
        return $tickets;
//        $catelera = Cartelera::find($catelera_id);
//        $salas = $catelera->sala;
//        $seats = Seats::where('sala_id', $salas->id)->get();
//        foreach ($seats as $seat) {
//            $ticket = Ticket::where('cartelera_id', $catelera_id)
//                ->where('fila', $seat->fila)
//                ->where('columna', $seat->columna)->first();
//            if ($ticket) {
//                $seat->activo = $ticket->estado;
//            }
//        }
//        return $seats;
    }
}
