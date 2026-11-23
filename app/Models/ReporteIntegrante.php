<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteIntegrante extends Model
{
    protected $table = 'reportes_integrantes';

    protected $fillable = [
        'solicitud_integrante_id',
        'reportante_id',
        'reportado_id',
        'motivo',
        'descripcion',
        'estado',
        'observaciones_admin',
        'fecha_resolucion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_resolucion' => 'date',
        ];
    }

    public function solicitud()
    {
        return $this->belongsTo(SolicitudIntegrante::class, 'solicitud_integrante_id');
    }

    public function reportante()
    {
        return $this->belongsTo(User::class, 'reportante_id');
    }

    public function reportado()
    {
        return $this->belongsTo(User::class, 'reportado_id');
    }
}