<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        "numeroFactura",
        "cuf",
        "cufd",
        "cui",
        "codigoSucursal",
        "codigoPuntoVenta",
        "fechaEmision",
        "montoTotal",
        "usuario",
        "codigoRecepcion",
        "siatEnviado",
        "codigoRecepcionEventoSignificativo",
        "siatAnulado",
        "tipo",
        "codigoDocumentoSector",
        "leyenda",
        "vip",
        "credito",
        "cortesia",
        "user_id",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function details(){
        return $this->hasMany(Detail::class);
    }
}
