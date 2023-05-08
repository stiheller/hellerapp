<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvConmutadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_conmutadores', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('numero');
            $table->string('serial', 50)->nullable();//Recordar agregar en las vistas..
            $table->string('marca', 50);
            $table->string('descripcion', 255)->nullable();
            $table->string('referencia_lugar', 255);
            $table->date('fecha_limpieza');

            $table->unsignedBigInteger('rack_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();

            $table->foreign('rack_id')->references('id')->on('inv_racks')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('sector_id')->references('id')->on('inv_sectores')->onDelete('set null')->onUpdate('cascade');


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
        Schema::dropIfExists('inv_conmutadores');
    }
}
