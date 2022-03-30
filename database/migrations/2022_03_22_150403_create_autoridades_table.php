<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoridades', function (Blueprint $table) {
            $table->id();
            $table->string('protocolo')->nullable();
            $table->string('precedencia',50)->unique();
            $table->string('cargo_aut')->unique();
            $table->string('nome',50);
            $table->string('foto')->nullable();
            $table->string('representando')->nullable();
            $table->string('precedencia_principal',50)->unique()->nullable();
            $table->string('cargo_principal')->nullable();
            $table->string('nome_principal')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cargo_aut')->references('cargo')->on('cargos');
            $table->foreign('cargo_principal')->references('cargo_aut')->on('autoridades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoridades');
    }
}
