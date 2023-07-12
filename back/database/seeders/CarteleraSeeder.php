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
        $fecha2Day = date("Y-m-d",strtotime("+2 day"));
        $fecha3Day = date("Y-m-d",strtotime("+3 day"));
        $fecha4Day = date("Y-m-d",strtotime("+4 day"));
        $fecha5Day = date("Y-m-d",strtotime("+5 day"));
        DB::table("carteleras")->insert([
            [
                'fecha'=>"$fecha",
                "horaInicio"=>"$fecha 04:00:00",
                "horaFin"=>"$fecha 12:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"3",
                "price_id"=>"7",
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
                "price_id"=>"8",
            ],
            [
                'fecha'=>"$fecha2Day",
                "horaInicio"=>"$fecha2Day 20:00:00",
                "horaFin"=>"$fecha2Day 22:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"2",
                "price_id"=>"9",
            ],
            [
                'fecha'=>"$fecha3Day",
                "horaInicio"=>"$fecha3Day 20:00:00",
                "horaFin"=>"$fecha3Day 22:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"3",
                "price_id"=>"2",
            ],
            [
                'fecha'=>"$fecha4Day",
                "horaInicio"=>"$fecha4Day 20:00:00",
                "horaFin"=>"$fecha4Day 22:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"2",
                "price_id"=>"3",
            ],
            [
                'fecha'=>"$fecha5Day",
                "horaInicio"=>"$fecha5Day 20:00:00",
                "horaFin"=>"$fecha5Day 22:00:00",
                "subtitulada"=>"NO",
                "idioma"=>"Español",
                "formato"=>"2D",
                "nroFuncion"=>"1",
                "user_id"=>"1",
                "movie_id"=>"1",
                "sala_id"=>"3",
                "price_id"=>"4",
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
