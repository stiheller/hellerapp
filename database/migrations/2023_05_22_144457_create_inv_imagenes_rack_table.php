<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvImagenesRackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_imagenes_rack', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('rack_id');

            $table->foreign('rack_id')->references('id')->on('inv_racks')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_imagenes_rack');
    }
}
