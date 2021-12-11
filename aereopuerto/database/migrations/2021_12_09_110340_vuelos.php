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
            $table->foreignId('origen_id')->constrained('aereopuertos');
            $table->foreignId('destino_id')->constrained('aereopuertos');
            $table->foreignId('compania_id')->constrained('companias');
            $table->timestamp('salida');
            $table->timestamp('llegada');
            $table->decimal('plazas', 3, 0);
            $table->decimal('precio', 8, 2);

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
