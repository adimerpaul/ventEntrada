<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Http\Requests\StoreCarteleraRequest;
use App\Http\Requests\UpdateCarteleraRequest;
use App\Models\Sale;

class CarteleraController extends Controller{
    public function index(){ return Cartelera::all(); }
    public function show(Cartelera $cartelera){ return $cartelera; }
    public function store(StoreCarteleraRequest $request){ return Cartelera::create($request->all()); }
    public function update(UpdateCarteleraRequest $request, Cartelera $cartelera){ return $cartelera->update($request->all()); }
    public function destroy(Cartelera $cartelera){ return $cartelera->delete(); }
    public function disponibles(){
        return Cartelera::select("movies.codeImg","movies.id","movies.title","movies.image","movies.urlVideo","movies.director","movies.reparto","movies.sinopsis","movies.genero","movies.duracion","movies.clasificacion","movies.idioma","movies.subtitulos","movies.formato","movies.fechaEstreno","movies.preVenta")
            ->join("movies","movies.id","=","carteleras.movie_id")
            ->join("salas","salas.id","=","carteleras.sala_id")
            ->join("prices","prices.id","=","carteleras.price_id")
            ->where("carteleras.activo","=","ACTIVO")
            ->groupBy("movies.codeImg","movies.id","movies.title","movies.image","movies.urlVideo","movies.director","movies.reparto","movies.sinopsis","movies.genero","movies.duracion","movies.clasificacion","movies.idioma","movies.subtitulos","movies.formato","movies.fechaEstreno","movies.preVenta")
            ->where("carteleras.fecha",">",date("Y-m-d"))
            ->get();
    }
    public function searchCatelera($movie_id){
        $fechaCarteleras = Cartelera::select("carteleras.fecha")
            ->where("carteleras.activo","=","ACTIVO")
            ->where("carteleras.movie_id","=",$movie_id)
            ->where("carteleras.fecha",">",date("Y-m-d"))
            ->groupBy("carteleras.fecha")
            ->get();
        $resposeCateleras = [];
        foreach($fechaCarteleras as $fechaCartelera){
            $horarios = Cartelera::with(["sala","price","movie"])
                ->where("carteleras.activo","=","ACTIVO")
                ->where("carteleras.movie_id","=",$movie_id)
                ->where("carteleras.fecha","=",$fechaCartelera->fecha)
                ->get();
            $resposeCateleras[] = [
                "fecha" => $fechaCartelera->fecha,
                "horarios" => $horarios
            ];
        }
        return $resposeCateleras;
    }
}
