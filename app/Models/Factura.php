<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_factura', 'fecha_emision', 'cliente_id', 'monto_total', 'impuestos', 'estado'
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
