<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'telefono',
        'email',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
