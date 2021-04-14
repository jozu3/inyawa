<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained();
            $table->double('matricula', 8, 2);
            $table->double('matricula2', 8, 2);
            $table->tinyInteger('ncuotas');
            $table->double('cuota', 8, 2);
            $table->double('cuota2', 8, 2);
            $table->double('certificacion', 8, 2);
            $table->double('certificacion2', 8, 2);
            $table->date('fecha');
            $table->tinyInteger('estado');
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
        Schema::dropIfExists('grupos');
    }
}
