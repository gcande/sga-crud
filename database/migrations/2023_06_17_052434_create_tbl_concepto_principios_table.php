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
        Schema::create('tbl_concepto_principios', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('con_Denominacion');
            $table->text('con_Observacion');
            $table->unsignedBigInteger('Codigo_resultado_aprendizaje');
            $table->foreign('Codigo_resultado_aprendizaje')->references('Codigo')->on('tbl_resultado_aprendizajes');
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
        Schema::dropIfExists('tbl_concepto_principios');
    }
};
