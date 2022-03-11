<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppAutoridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_autoridades', function (Blueprint $table) {
            $table->id();
            $table->integer('precendencia',50);
            $table->string('cargo',50);
            $table->string('local_de_trabalho',50);
            $table->string('nome',50);
            $table->string('representando',50);
            $table->string('cargo_principal',50);
            $table->string('nome_principal',50);
            $table->string('foto',50);
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
        Schema::dropIfExists('app_autoridades');
    }
}
