<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'restringido_hasta' => 'date',
        ];
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'user_id');
    }

    public function actividadesConfirmadas()
    {
        return $this->belongsToMany(
            Actividad::class,
            'asistencias',
            'user_id',
            'actividad_id'
        )->withTimestamps();
    }

    public function librosIntegrantes()
    {
        return $this->hasMany(LibroIntegrante::class, 'user_id');
    }

    public function solicitudesIntegrantes()
    {
        return $this->hasMany(SolicitudIntegrante::class, 'solicitante_id');
    }

    public function estaRestringido(): bool
    {
        return $this->restringido_hasta !== null
            && $this->restringido_hasta->gte(today());
    }
}
