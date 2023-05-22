<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvImagenesConmutadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_imagenes_conmutador', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('conmutador_id');

            $table->foreign('conmutador_id')->references('id')->on('inv_conmutadores')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_imagenes_conmutador');
    }
}
