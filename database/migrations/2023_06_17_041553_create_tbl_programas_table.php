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
        Schema::create('tbl_programas', function (Blueprint $table) {
            $table->id('Codigo');
            $table->string('prog_Denominacion',300);
            $table->integer('prog_version');
            $table->enum('prog_Estado',['Activo','Inactivo'])->nullable();
            $table->string('prog_HorasEstimadas',45);
            $table->string('prog_Creditos',45);
            $table->string('prog_Descripcion',1000);
            $table->string('prog_DuracionMeses',45);
            // $table->unsignedBigInteger('Codigo_nivel');//llave primaria
            // $table->foreign('Codigo_nivel')->references('Codigo')->on('tbl_nivel_formacions');//relacion
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
        Schema::dropIfExists('tbl_programas');
    }
};
