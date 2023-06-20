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
        Schema::create('tbl_material_requeridos', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('mat_Denominacion');
            $table->text('mat_Observacion');
            $table->unsignedBigInteger('Codigo_ra');
            $table->foreign('Codigo_ra')->references('Codigo')->on('tbl_resultado_aprendizajes');
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
        Schema::dropIfExists('tbl_material_requeridos');
    }
};
