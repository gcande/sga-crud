<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eventos', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string("title",255);
            $table->text("descripcion");
            $table->enum('color',['red','blue','green'])->nullable();

            $table->dateTime("start");
            $table->dateTime("end");
            
            $table->unsignedBigInteger('Codigo_resultado_aprendizaje')->nullable();
            $table->unsignedBigInteger('Codigo_instructor')->nullable();
            $table->unsignedBigInteger('Codigo_ficha')->nullable();
            $table->unsignedBigInteger('Codigo_ambiente')->nullable();
            $table->foreign('Codigo_resultado_aprendizaje')->references('Codigo')->on('tbl_resultado_aprendizajes');
            $table->foreign('Codigo_instructor')->references('Codigo')->on('tbl_instructores');
            $table->foreign('Codigo_ficha')->references('Codigo')->on('tbl_ficha_caracterizacions');
            $table->foreign('Codigo_ambiente')->references('Codigo')->on('tbl_ambientes');
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
        Schema::dropIfExists('tbl_eventos');
    }
};
