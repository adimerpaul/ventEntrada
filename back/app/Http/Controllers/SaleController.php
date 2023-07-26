<?php

namespace App\Http\Controllers;

use App\Mail\NuevaCompra;
use App\Models\Cartelera;
use App\Models\Movie;
use App\Models\Sala;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SaleController extends Controller{
    public function index(Request $request){
        $dateInit = $request->get('dateIni').' 00:00:00';
        $dateEnd = $request->get('dateFin').' 23:59:59';
        $sales = Sale::whereBetween('fechaEmision', [$dateInit, $dateEnd])
            ->with(['details','user','tickets'])
            ->orderBy('id','desc')->get();
        return $sales;
    }
    public function cantidadPedidaUserMax4(Request $request){

        //verificamos hora de atencion
//        $horaDeAtencion = date('H:i:s', strtotime('08:00:00'));
//        $horaDeCierre = date('H:i:s', strtotime('22:00:00'));
//        $horaActual = date('H:i:s');
//        if ($horaActual<$horaDeAtencion || $horaActual>$horaDeCierre) {
//            return response()->json([
//                'message' => 'Solo puede comprar entradas entre las 8:00 y las 22:00',
//            ], 403);
//        }


        //verificamos que el usuario no haya comprado mas de 4 entradas en el dia
        $saleCount = Ticket::where('user_id',$request->user()->id)
            ->whereIn('estado',['RESERVADO','OCUPADO'])
            ->whereDate('created_at',date('Y-m-d'))
            ->count();
        if ($saleCount>=4) {
            return response()->json([
                'message' => 'No puede comprar mas de 4 entradas por dia',
            ], 403);
        }else if (count($request->seats)+$saleCount>4){
            return response()->json([
                'message' => 'Solo puede comprar '.(4-$saleCount).' entradas mas',
            ], 403);
        }
        //verificamos no compren el mismo asiento

        $letras = array('', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB');
        foreach ($request->seats as $seat){
            $ticket=Ticket::find($seat['id']);
            if ($ticket){
                if ($ticket->user_id == $request->user()->id && $ticket->estado == 'RESERVADO SIN PAGAR') {
                    $ticket->estado = 'DISPONIBLE';
                    $ticket->save();
                }
                if ($ticket->estado=='RESERVADO' || $ticket->estado=='RESERVADO SIN PAGAR'){
                    return response()->json([
                        'message' => 'El asiento '.$letras[$seat['fila']].'-'.$seat['columna'].' ya fue reservado',
                    ], 403);
                }
            }
        }

        foreach ($request->seats as $seat){
            $ticket=Ticket::find($seat['id']);
            $ticket->estado='RESERVADO SIN PAGAR';
            $ticket->fechaVencimiento = date('Y-m-d H:i:s', strtotime('+5 minutes'));
            $ticket->user_id=$request->user()->id;
            $ticket->save();
//            error_log(json_encode($ticket));
//            $seat['cartelera_id']=$request->cartelera['id'];
        }
        //error_log(json_encode($request->cartelera));
//        $letras = array('', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB');
//        foreach ($request->seats as $seat){
//            $ticket=Ticket::where('fila',$seat['fila'])
//                ->where('columna',$seat['columna'])
//                ->where('cartelera_id',$request->cartelera['id'])
//                ->first();
//            if ($ticket){
//                if ($ticket->user_id==$request->user()->id){
//                    $tickets=Ticket::where('user_id',$request->user()->id)
//                        ->where('estado','RESERVADO')
//                        ->whereDate('created_at',date('Y-m-d'))
//                        ->get();
//                    foreach ($tickets as $ticket){
//                        $ticket->estado='ACTIVO';
//                        $ticket->save();
//                    }
//                }elseif ($ticket->estado=='RESERVADO'){
//                    return response()->json([
//                        'message' => 'El asiento '.$letras[$seat['fila']].'-'.$seat['columna'].' ya fue reservado',
//                    ], 403);
//                }
//            }
//        }
//        foreach ($request->seats as $seat) {
//            $numBoleto = Ticket::where('cartelera_id', $request->cartelera['id'])->count() + 1;
//            $ticket = new Ticket();
//            $ticket->numboc = $request->cartelera['sala']['nro'] .
//                $request->cartelera['sala']['id'] .
//                date('Ymd', strtotime($request->cartelera['fecha'])) .
//                $request->cartelera['nroFuncion'] .
//                $request->cartelera['price']['serie']
//                . '-' .
//                $numBoleto;
//            $ticket->numero = $numBoleto;
//            $ticket->fecha = date('Y-m-d');
//            $ticket->numeroFuncion = $request->cartelera['nroFuncion'];
//            $ticket->nombreSala = $request->cartelera['sala']['nombre'];
//            $ticket->serieTarifa = $request->cartelera['price']['serie'];
//            $ticket->fechaFuncion = $request->cartelera['fecha'];
//            $ticket->horaFuncion = $request->cartelera['horaInicio'];
//            $ticket->fila = $seat['fila'];
//            $ticket->columna = $seat['columna'];
//            $ticket->letra = $letras[$seat['fila']];
//            $ticket->costo = $request->cartelera['price']['precio'];
//            $ticket->titulo = $request->cartelera['movie']['title'];
//            $ticket->promo = false;
//            $ticket->devuelto = '';
//            $ticket->idCupon = '';
//            $ticket->movie_id = $request->cartelera['movie']['id'];
//            $ticket->estado = 'RESERVADO';
//            $ticket->user_id = $request->user()->id;
//            $ticket->cartelera_id = $request->cartelera['id'];
//            $ticket->price_id = $request->cartelera['price']['id'];
//            $ticket->sala_id = $request->cartelera['sala']['id'];
//            $ticket->save();
//        }
    }
    public function store(StoreSaleRequest $request){
//        $user= User::find($request->user()->id);
//        $user->nit=$request->nit;
//        $user->razon=$request->razon;
//        $user->save();
        DB::beginTransaction();

        $letras = array('', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB');
        foreach ($request->seats as $seat){
            $ticket=Ticket::where('fila',$seat['fila'])
                ->where('columna',$seat['columna'])
                ->where('cartelera_id',$request->cartelera['id'])
                ->first();
            if ($ticket){
                if ($ticket->estado=='RESERVADO'){
                    return response()->json([
                        'message' => 'El asiento '.$letras[$seat['fila']].'-'.$seat['columna'].' ya fue reservado',
                    ], 403);
                }
            }
        }

        $sale = new Sale();
        $sale->numeroFactura="0";
        $sale->cuf="";
        $sale->cufd="";
        $sale->cui="";
        $sale->codigoSucursal="0";
        $sale->codigoPuntoVenta="0";
        $sale->fechaEmision=date("Y-m-d H:i:s");
        $sale->montoTotal=$request->sale['montoTotal'];
        $sale->usuario=$request->user()->name;
        $sale->codigoRecepcion="";
        $sale->siatEnviado=0;
        $sale->image=$request->sale['image'];
        $sale->codigoRecepcionEventoSignificativo="";
        $sale->siatAnulado=0;
        $sale->tipo="BOLETERIA";
        $sale->codigoDocumentoSector=1;
        $sale->leyenda="";
        $sale->vip="";
        $sale->credito="";
        $sale->cortesia="";
        $sale->user_id=$request->user()->id;
        $sale->save();
        $ticketsVendidos=[];
        foreach ($request->seats as $seat){
            $ticket=Ticket::where('fila',$seat['fila'])
                ->where('columna',$seat['columna'])
                ->where('cartelera_id',$request->cartelera['id'])
                ->first();
            if ($ticket){
                $ticketsVendidos[]=$letras[$seat['fila']].'-'.$seat['columna'];
                $ticket->fechaVencimiento=null;
                $ticket->sale_id=$sale->id;
                $ticket->estado='RESERVADO';
                $ticket->save();
            }
//            $numBoleto=Ticket::where('cartelera_id',$request->cartelera['id'])->count()+1;
//            $ticket = new Ticket();
//            $ticket->numboc=$request->cartelera['sala']['nro'].
//                $request->cartelera['sala']['id'].
//                date('Ymd', strtotime($request->cartelera['fecha'])).
//                $request->cartelera['nroFuncion'].
//                $request->cartelera['price']['serie']
//                .'-'.
//                $numBoleto;
////            $ticket->numboc=$request->cartelera->sala->nro.$request->cartelera->sala->id.date('Ymd', strtotime($request->cartelera->fecha)).$request->cartelera->nroFuncion.$request->cartelera->price->serie.'-'.$numBoleto;
//            $ticket->numero=$numBoleto;
//            $ticket->fecha=date('Y-m-d');
//            $ticket->numeroFuncion=$request->cartelera['nroFuncion'];
//            $ticket->nombreSala=$request->cartelera['sala']['nombre'];
//            $ticket->serieTarifa=$request->cartelera['price']['serie'];
//            $ticket->fechaFuncion=$request->cartelera['fecha'];
//            $ticket->horaFuncion=$request->cartelera['horaInicio'];
//            $ticket->fila=$seat['fila'];
//            $ticket->columna=$seat['columna'];
//            $ticket->letra=$letras[$seat['fila']];
//            $ticket->costo=$request->cartelera['price']['precio'];
//            $ticket->titulo=$request->cartelera['movie']['title'];
//            $ticket->promo=false;
//            $ticket->devuelto='';
//            $ticket->idCupon='';
//            $ticket->movie_id=$request->cartelera['movie']['id'];
//            $ticket->estado='RESERVADO';
//            $ticket->user_id=$request->user()->id;
//            $ticket->cartelera_id=$request->cartelera['id'];
//            $ticket->sale_id=$sale->id;
//            $ticket->price_id=$request->cartelera['price']['id'];
//            $ticket->sala_id=$request->cartelera['sala']['id'];
//            $ticket->save();
        }
        $movie = Movie::find($request->cartelera['movie']['id']);
        $sala = Sala::find($request->cartelera['sala']['id']);
        $cartelera = Cartelera::find($request->cartelera['id']);
        Mail::to(env('EMAIL'))->send(new NuevaCompra($sale,$movie,$ticketsVendidos,$sala,$cartelera));
        DB::commit();
    }
}
