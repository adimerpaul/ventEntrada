<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Http\Requests\StoreCarteleraRequest;
use App\Http\Requests\UpdateCarteleraRequest;

class CarteleraController extends Controller{
    public function index(){ return Cartelera::all(); }
    public function show(Cartelera $cartelera){ return $cartelera; }
    public function store(StoreCarteleraRequest $request){ return Cartelera::create($request->all()); }
    public function update(UpdateCarteleraRequest $request, Cartelera $cartelera){ return $cartelera->update($request->all()); }
    public function destroy(Cartelera $cartelera){ return $cartelera->delete(); }
    public function disponibles(){
        return Cartelera::select("movies.id","movies.title","movies.image","movies.urlVideo","movies.director","movies.reparto","movies.sinopsis","movies.genero","movies.duracion","movies.clasificacion","movies.idioma","movies.subtitulos","movies.formato","movies.fechaEstreno","movies.preVenta")
            ->join("movies","movies.id","=","carteleras.movie_id")
            ->join("salas","salas.id","=","carteleras.sala_id")
            ->join("prices","prices.id","=","carteleras.price_id")
            ->where("carteleras.activo","=","ACTIVO")
            ->groupBy("movies.id","movies.title","movies.image","movies.urlVideo","movies.director","movies.reparto","movies.sinopsis","movies.genero","movies.duracion","movies.clasificacion","movies.idioma","movies.subtitulos","movies.formato","movies.fechaEstreno","movies.preVenta")
            ->where("carteleras.fecha",">",date("Y-m-d"))
            ->get();
    }
}
