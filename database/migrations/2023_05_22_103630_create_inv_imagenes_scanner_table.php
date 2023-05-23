<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvImagenesScannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_imagenes_scanner', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('scanner_id');

            $table->foreign('scanner_id')->references('id')->on('inv_scanners')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('inv_imagenes_scanner');
    }
}
