<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'urlVideo',
        'director',
        'reparto',
        'sinopsis',
        'genero',
        'duracion',
        'clasificacion',
        'idioma',
        'subtitulos',
        'formato',
        'fechaEstreno',
        'preVenta',
    ];
}
