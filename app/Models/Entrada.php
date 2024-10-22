<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    // Definir los campos que son asignables
    protected $fillable = [
        'evento_id',
        'nombre_entrada',
        'descripcion',
        'precio',
        'cantidad',
    ];

    // Relación con el modelo Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
