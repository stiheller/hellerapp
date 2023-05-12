<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvConexionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_conexiones', function (Blueprint $table) {
            $table->id();

            $table->integer('boca_patch');
            $table->integer('boca_switch');
            $table->tinyInteger('conectada_rack')->default(1);
            $table->tinyInteger('en_uso')->default(0);
            $table->date('fecha_impactada')->nullable();
            
            $table->unsignedBigInteger('conmutador_id')->nullable();
            $table->unsignedBigInteger('ip_id')->nullable();

            $table->foreign('conmutador_id')->references('id')->on('inv_conmutadores')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('ip_id')->references('id')->on('inv_ips')->onDelete('set null')->onUpdate('cascade');
            //No se que se hace si se elimina un ip, por eso no pongo una restricción de clave foránea.


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
        Schema::dropIfExists('inv_conexiones');
    }
}
