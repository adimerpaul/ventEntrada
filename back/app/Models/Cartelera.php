<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartelera extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        "horaInicio",
        "horaFin",
        "subtitulada",
        "idioma",
        "formato",
        "activo",
        "nroFuncion",
        "user_id",
        "movie_id",
        "sala_id",
        "price_id",
    ];
    public function user(){ return $this->belongsTo(User::class); }
    public function movie(){ return $this->belongsTo(Movie::class); }
    public function sala(){ return $this->belongsTo(Sala::class); }
    public function price(){ return $this->belongsTo(Price::class); }
}
