<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
            'ver contenido',
            'crear contenido',
            'editar contenido',
            'eliminar contenido',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }

        $administrador = Role::create(['name' => 'Administrador']);
        $usuario = Role::create(['name' => 'Usuario']);

        $administrador->givePermissionTo(Permission::all());

        $usuario->givePermissionTo([
            'ver contenido',
        ]);
    }
}