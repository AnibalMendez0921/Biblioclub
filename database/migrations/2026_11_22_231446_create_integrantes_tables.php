<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('restringido_hasta')->nullable()->after('remember_token');
        });

        Schema::create('libros_integrantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('titulo');
            $table->string('autor');
            $table->string('genero');
            $table->text('descripcion')->nullable();
            $table->string('portada')->nullable();
            $table->text('condiciones')->nullable();
            $table->string('estado')->default('Disponible');
            $table->timestamps();
        });

        Schema::create('solicitudes_integrantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_integrante_id')->constrained('libros_integrantes')->cascadeOnDelete();
            $table->foreignId('solicitante_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('propietario_id')->constrained('users')->cascadeOnDelete();
            $table->string('mensaje', 500)->nullable();
            $table->date('fecha_limite_devolucion')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->string('estado')->default('Pendiente');
            $table->timestamps();

            $table->index(['libro_integrante_id', 'estado']);
        });

        Schema::create('reportes_integrantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_integrante_id')->constrained('solicitudes_integrantes')->cascadeOnDelete();
            $table->foreignId('reportante_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reportado_id')->constrained('users')->cascadeOnDelete();
            $table->string('motivo');
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('Abierto');
            $table->text('observaciones_admin')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportes_integrantes');
        Schema::dropIfExists('solicitudes_integrantes');
        Schema::dropIfExists('libros_integrantes');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('restringido_hasta');
        });
    }
};