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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('numboc')->nullable();
            $table->string('numero')->nullable();
            $table->date('fecha')->nullable();
            $table->dateTime('fechaVencimiento')->nullable();
            $table->string('numeroFuncion')->nullable();
            $table->string('nombreSala')->nullable();
            $table->string('serieTarifa')->nullable();
            $table->date('fechaFuncion')->nullable();
            $table->datetime('horaFuncion')->nullable();
            $table->integer('fila')->nullable();
            $table->integer('columna')->nullable();
            $table->string('letra')->nullable();
            $table->string('costo')->nullable();
            $table->string('titulo')->nullable();
            $table->boolean('promo')->default(false);
            $table->string('devuelto')->nullable()->default(0);
            $table->string('idCupon')->nullable();
            $table->string('movie_id')->nullable();
            $table->string('estado')->nullable()->default('RESERVADO');
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedBigInteger("cartelera_id")->nullable();
            $table->foreign("cartelera_id")->references("id")->on("carteleras");
            $table->unsignedBigInteger("sale_id")->nullable();
            $table->foreign("sale_id")->references("id")->on("sales");
            $table->unsignedBigInteger("price_id")->nullable();
            $table->foreign("price_id")->references("id")->on("prices");
            $table->unsignedBigInteger("sala_id")->nullable();
            $table->foreign("sala_id")->references("id")->on("salas");
//            $table->unsignedBigInteger("user_id")->nullable();
//            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
