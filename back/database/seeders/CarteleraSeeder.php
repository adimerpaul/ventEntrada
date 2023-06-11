<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarteleraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fecha = date("Y-m-d",strtotime("+1 day"));
        DB::table("carteleras")->insert([
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 10:00:00",
                "horaFin"=>"$fecha 12:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"3",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 10:00:00",
                "horaFin"=>"$fecha 12:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"2",
                "sala_id"=>"2",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"2",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 10:00:00",
                "horaFin"=>"$fecha 12:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"3",
                "sala_id"=>"3",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"3",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 10:00:00",
                "horaFin"=>"$fecha 12:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"4",
                "sala_id"=>"2",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"4",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"5",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 13:00:00",
                "horaFin"=>"$fecha 15:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"6",
                "sala_id"=>"1",
                "price_id"=>"1",
            ],

        ]);
    }
}
