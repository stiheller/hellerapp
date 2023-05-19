<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_monitores', function (Blueprint $table) {
            $table->id();

            $table->string('marca', 50);
            $table->string('tamanio')->default('19 Pulgadas');
            $table->string('modelo', 50);
            $table->string('serial', 50);
            $table->string('patrimonial', 50)->nullable();
            $table->tinyInteger('estado')->default(1);
            
            $table->unsignedBigInteger('equipamiento_id')->nullable();

            $table->foreign('equipamiento_id')->references('id')->on('inv_equipamientos')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_monitores');
    }
}
