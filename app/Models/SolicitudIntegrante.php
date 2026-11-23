<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudIntegrante extends Model
{
    protected $table = 'solicitudes_integrantes';

    protected $fillable = [
        'libro_integrante_id',
        'solicitante_id',
        'propietario_id',
        'mensaje',
        'fecha_limite_devolucion',
        'fecha_entrega',
        'fecha_devolucion',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_limite_devolucion' => 'date',
            'fecha_entrega' => 'date',
            'fecha_devolucion' => 'date',
        ];
    }

    public function libro()
    {
        return $this->belongsTo(LibroIntegrante::class, 'libro_integrante_id');
    }

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'solicitante_id');
    }

    public function propietario()
    {
        return $this->belongsTo(User::class, 'propietario_id');
    }

    public function reportes()
    {
        return $this->hasMany(ReporteIntegrante::class, 'solicitud_integrante_id');
    }

    public function estaVencida(): bool
    {
        return $this->estado === 'Activo'
            && $this->fecha_limite_devolucion !== null
            && $this->fecha_limite_devolucion->lt(today());
    }

    public function etiqueta(): string
    {
        return match ($this->estado) {
            'Pendiente' => 'Solicitud pendiente',
            'Aceptado' => 'Aceptado · por entregar',
            'Activo' => 'Préstamo activo',
            'DevolucionPendiente' => 'Devolución por confirmar',
            default => $this->estado,
        };
    }

    public function clase(): string
    {
        return match ($this->estado) {
            'Pendiente' => 'st-pendiente',
            'Aceptado', 'Activo', 'DevolucionPendiente' => 'st-activo',
            'Devuelto' => 'st-devuelto',
            'Rechazado', 'Cancelado' => 'st-rechazado',
            default => '',
        };
    }
}