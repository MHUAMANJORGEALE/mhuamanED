<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Definir los campos que son asignables
    protected $fillable = [
        'nombre_evento',
        'descripcion',
        'fecha_evento',
    ];

    // Relación con el modelo Entrada
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
