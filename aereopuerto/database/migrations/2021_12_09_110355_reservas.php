<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table){
            $table->id();
            $table->string('denominacion', 255);
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('vuelo_id')->constrained('vuelos');
            $table->decimal("asiento", 3, 0);
            $table->timestamp("fecha_hora");
            $table->unique("vuelo_id", "asiento");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
