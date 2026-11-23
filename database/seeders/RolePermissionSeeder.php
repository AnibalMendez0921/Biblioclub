<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
            Permission::findOrCreate($permiso);
        }

        $administrador = Role::findOrCreate('Administrador');
        $usuario = Role::findOrCreate('Usuario');

        $administrador->givePermissionTo(Permission::all());

        $usuario->givePermissionTo([
            'ver contenido',
        ]);

        $correoAdmin = getenv('ADMIN_EMAIL');
        if ($correoAdmin) {
            $user = User::whereRaw('lower(email) = ?', [strtolower($correoAdmin)])->first();
            if ($user) {
                $user->syncRoles(['Administrador']);
            }
        }
    }
}
