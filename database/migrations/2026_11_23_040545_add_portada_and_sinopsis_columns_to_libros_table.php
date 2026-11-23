
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            if (!Schema::hasColumn('libros', 'portada')) {
                $table->string('portada')->nullable();
            }

            if (!Schema::hasColumn('libros', 'sinopsis')) {
                $table->text('sinopsis')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            if (Schema::hasColumn('libros', 'portada')) {
                $table->dropColumn('portada');
            }

            if (Schema::hasColumn('libros', 'sinopsis')) {
                $table->dropColumn('sinopsis');
            }
        });
    }
};

