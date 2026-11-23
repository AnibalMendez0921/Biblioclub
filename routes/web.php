<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\CatalogoLectorController;
use App\Http\Controllers\SolicitudPrestamoController;
use App\Http\Controllers\MisPrestamosController;
use App\Http\Controllers\PrestamoIntegranteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalogo', [CatalogoLectorController::class, 'index'])
    ->middleware('auth')
    ->name('catalogo.index');

Route::get('/catalogo/solicitar', [CatalogoLectorController::class, 'solicitar'])
    ->middleware('auth')
    ->name('catalogo.solicitar');

Route::post('/catalogo/{libro}/solicitar', [SolicitudPrestamoController::class, 'store'])
    ->middleware('auth')
    ->name('prestamos.solicitar');

Route::get('/mis-prestamos', [MisPrestamosController::class, 'index'])
    ->middleware('auth')
    ->name('mis-prestamos.index');

Route::middleware('auth')->group(function () {

    Route::prefix('prestamos-integrantes')
        ->name('prestamos-integrantes.')
        ->group(function () {

            Route::get('/', [PrestamoIntegranteController::class, 'index'])->name('index');
            Route::get('/publicar', [PrestamoIntegranteController::class, 'create'])->name('create');
            Route::post('/publicar', [PrestamoIntegranteController::class, 'store'])->name('store');
            Route::get('/libros/{libro}/editar', [PrestamoIntegranteController::class, 'edit'])->name('edit');
            Route::put('/libros/{libro}', [PrestamoIntegranteController::class, 'update'])->name('update');
            Route::patch('/libros/{libro}/retirar', [PrestamoIntegranteController::class, 'retirar'])->name('retirar');
            Route::patch('/libros/{libro}/republicar', [PrestamoIntegranteController::class, 'republicar'])->name('republicar');

            Route::post('/libros/{libro}/solicitar', [PrestamoIntegranteController::class, 'solicitar'])->name('solicitar');

            Route::get('/mis-prestamos', [PrestamoIntegranteController::class, 'misPrestamos'])->name('mis-prestamos');

            Route::patch('/solicitudes/{solicitud}/aceptar', [PrestamoIntegranteController::class, 'aceptar'])->name('aceptar');
            Route::patch('/solicitudes/{solicitud}/rechazar', [PrestamoIntegranteController::class, 'rechazar'])->name('rechazar');
            Route::patch('/solicitudes/{solicitud}/cancelar', [PrestamoIntegranteController::class, 'cancelar'])->name('cancelar');
            Route::patch('/solicitudes/{solicitud}/confirmar-entrega', [PrestamoIntegranteController::class, 'confirmarEntrega'])->name('confirmar-entrega');
            Route::patch('/solicitudes/{solicitud}/devuelto', [PrestamoIntegranteController::class, 'marcarDevuelto'])->name('devuelto');
            Route::patch('/solicitudes/{solicitud}/confirmar-devolucion', [PrestamoIntegranteController::class, 'confirmarDevolucion'])->name('confirmar-devolucion');

            Route::post('/solicitudes/{solicitud}/reportar', [PrestamoIntegranteController::class, 'reportar'])->name('reportar');
        });

    Route::get('/actividades-club', [ActividadController::class, 'club'])
        ->name('actividades-club.index');

    Route::post(
        '/actividades/{actividad}/confirmar',
        [AsistenciaController::class, 'confirmar']
    )->name('actividades.confirmar');

    Route::delete(
        '/actividades/{actividad}/cancelar',
        [AsistenciaController::class, 'cancelar']
    )->name('actividades.cancelar');
});

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'role:Administrador'])->name('admin');

Route::middleware(['auth', 'role:Administrador'])->group(function () {

    Route::resource('libros', LibroController::class);

    Route::get('/admin/usuarios', [AdminUsuarioController::class, 'index'])
        ->name('admin.usuarios.index');

    Route::patch('/admin/usuarios/{usuario}/rol', [AdminUsuarioController::class, 'actualizarRol'])
        ->name('admin.usuarios.actualizarRol');

    Route::get('/prestamos', [PrestamoController::class, 'index'])
        ->name('prestamos.index');

    Route::patch('/prestamos/{prestamo}/aprobar', [PrestamoController::class, 'aprobar'])
        ->name('prestamos.aprobar');

    Route::patch('/prestamos/{prestamo}/rechazar', [PrestamoController::class, 'rechazar'])
        ->name('prestamos.rechazar');

    Route::get('/prestamos/crear', [PrestamoController::class, 'create'])
        ->name('prestamos.create');

    Route::post('/prestamos', [PrestamoController::class, 'store'])
        ->name('prestamos.store');

    Route::patch('/prestamos/{prestamo}/devolver', [PrestamoController::class, 'devolver'])
        ->name('prestamos.devolver');

    Route::get('/actividades', [ActividadController::class, 'index'])
        ->name('actividades.index');

    Route::get('/actividades/crear', [ActividadController::class, 'create'])
        ->name('actividades.create');

    Route::post('/actividades', [ActividadController::class, 'store'])
        ->name('actividades.store');

    Route::get('/actividades/{actividad}/editar', [ActividadController::class, 'edit'])
        ->name('actividades.edit');

    Route::put('/actividades/{actividad}', [ActividadController::class, 'update'])
        ->name('actividades.update');

    Route::patch('/actividades/{actividad}/estado', [ActividadController::class, 'cambiarEstado'])
        ->name('actividades.estado');

    Route::delete('/actividades/{actividad}', [ActividadController::class, 'destroy'])
        ->name('actividades.destroy');

    Route::get(
        '/administrador/actividades/{actividad}/asistentes',
        [AsistenciaController::class, 'asistentes']
    )->name('admin.actividades.asistentes');

    Route::get('/informes', [InformeController::class, 'index'])
        ->name('informes.index');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
