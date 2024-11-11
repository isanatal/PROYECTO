<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    use HasFactory;

    // Si el nombre de la tabla no es plural o sigue una convención diferente,
    // puedes especificar el nombre de la tabla manualmente
    protected $table = 'clientes';

    // Especifica qué campos son asignables masivamente
    protected $fillable = [
        'nombre', 'email', 'telefono', 'direccion',
    ];
}
