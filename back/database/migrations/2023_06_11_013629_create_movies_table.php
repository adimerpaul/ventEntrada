<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('urlVideo')->nullable();
            $table->string('director')->nullable();
            $table->text('reparto')->nullable();
            $table->text('sinopsis')->nullable();
            $table->string('genero')->nullable();
            $table->string('duracion')->nullable();
            $table->string('clasificacion')->nullable();
            $table->string('idioma')->nullable();
            $table->string('subtitulos')->nullable();
            $table->string('formato')->nullable();
            $table->date('fechaEstreno')->nullable();
            $table->string('preVenta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
