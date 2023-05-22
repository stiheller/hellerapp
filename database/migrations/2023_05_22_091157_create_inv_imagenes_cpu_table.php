<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvImagenesCpuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_imagenes_cpu', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('cpu_id');

            $table->foreign('cpu_id')->references('id')->on('inv_cpus')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_imagenes_cpu');
    }
}
