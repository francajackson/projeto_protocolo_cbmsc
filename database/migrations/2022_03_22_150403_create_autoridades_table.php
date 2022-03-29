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
            $table->string('precedencia',50)->unique();
            $table->string('cargo_aut')->unique();
            $table->string('nome',50);
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cargo_aut')->references('cargo')->on('cargos');
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
