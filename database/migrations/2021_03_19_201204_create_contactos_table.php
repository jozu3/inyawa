<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('origen')->nullable();
            $table->string('codigo_c')->nullable();
            $table->string('nombres');
            $table->string('apellidos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('doc')->nullable();
            $table->tinyInteger('grado_academico')->nullable();
            $table->tinyInteger('estado');
            $table->foreignId('empleado_id')->constrained();
            $table->tinyInteger('newassign')->default(1);
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
        Schema::dropIfExists('contactos');
    }
}
