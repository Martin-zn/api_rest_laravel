<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'razon_social',
        'categoria_id',
        'direccion',
        'telefono',
        'pagina',
        'email',
        'rut',
        'observaciones'

    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
