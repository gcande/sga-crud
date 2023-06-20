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
        Schema::create('tbl_competencias', function (Blueprint $table) {
            $table->id('Codigo');
            $table->text('comp_Denominacion');
            $table->string('comp_VersionNCl',11);
            $table->string('comp_DuracionEstimada',11);
            $table->integer('comp_Creditos');
            $table->integer('comp_Horas');
            $table->integer('comp_Horas_FI');
            $table->unsignedBigInteger('Codigo_programa');
            $table->foreign('Codigo_programa')->references('Codigo')->on('tbl_programas');
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
        Schema::dropIfExists('tbl_competencias');
    }
};
