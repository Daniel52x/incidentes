<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_incidente_id')->constrained('tipo_incidente');
            $table->foreignId('criticidade_id')->constrained('criticidade');
            $table->string('titulo', 255);
            $table->text('descricao');
            $table->char('status', 1)->default(1);
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
        Schema::dropIfExists('incidente');
    }
}
