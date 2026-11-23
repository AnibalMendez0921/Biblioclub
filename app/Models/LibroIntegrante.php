<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroIntegrante extends Model
{
    protected $table = 'libros_integrantes';

    protected $fillable = [
        'user_id',
        'titulo',
        'autor',
        'genero',
        'descripcion',
        'portada',
        'condiciones',
        'estado',
    ];

    public function propietario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudIntegrante::class, 'libro_integrante_id');
    }
}
