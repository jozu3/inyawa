<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_id')->constrained();
            $table->foreignId('alumno_unidade_id')->constrained()->onDelete('cascade');;
            $table->double('valor')->nullable();
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
        Schema::dropIfExists('alumno_notas');
    }
}
