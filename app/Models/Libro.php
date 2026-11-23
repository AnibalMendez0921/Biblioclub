<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'cantidad_total',
        'cantidad_disponible',
        'portada',
        'sinopsis',
    ];

    protected function casts(): array
    {
        return [
            'cantidad_total' => 'integer',
            'cantidad_disponible' => 'integer',
        ];
    }
}