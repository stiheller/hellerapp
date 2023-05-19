<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvRacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_racks', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('slug', 50);
            $table->string('descripcion', 255)->nullable();
            $table->string('referencia_lugar', 255)->nullable();
            $table->tinyInteger('planta')->default(1);
            $table->date('fecha_limpieza');

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
        Schema::dropIfExists('inv_racks');
    }
}
