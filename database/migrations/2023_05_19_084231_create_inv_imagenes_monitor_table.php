<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvImagenesMonitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_imagenes_monitor', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('monitor_id');
            $table->foreign('monitor_id')->references('id')->on('inv_monitores')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_imagenes_monitor');
    }
}
