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
        Schema::create('tbl_resultado_aprendizajes', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('resul_Denominacion');

            $table->unsignedBigInteger('Codigo_competencias');
            
            $table->foreign('Codigo_competencias')->references('Codigo')->on('tbl_competencias');
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
        Schema::dropIfExists('tbl_resultado_aprendizajes');
    }
};
