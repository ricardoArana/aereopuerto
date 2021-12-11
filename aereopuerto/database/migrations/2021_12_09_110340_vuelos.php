<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vuelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table){
            $table->id();
            $table->string('codigo', 6)->unique();
            $table->foreignId('origen_id')->constrained('aereopuerto');
            $table->foreignId('destino_id')->constrained('aereopuerto');
            $table->foreignId('compania_id')->constrained('compania');
            $table->timestamp('salida');
            $table->timestamp('llegada');
            $table->integer('plazas', 3);
            $table->float('precio', 8, 2);

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
