<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->String('descripcionMG')->nullable();
            $table->String('descripcionMF')->nullable();
            $table->String('descripcionAL')->nullable();
            $table->String('descripcionPS')->nullable();

           
            $table->unsignedBigInteger('pAccionId');
            $table->foreign('pAccionId')->on('p_accions')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
}
