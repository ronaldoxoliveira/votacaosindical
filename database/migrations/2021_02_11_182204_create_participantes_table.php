<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('instituicao_id')->unsigned();
            $table->string('nome');
            $table->string('cpf',11)->unique();
            $table->date('datanasc');
            $table->char('sexo')->default('M');
            $table->string('email')->unique();
            $table->string('celular',11)->default('99999999999');
            $table->string('tipo_participante',10)->default('HABILITADO');
            $table->string('status_participante',20)->default('ATIVO');
            $table->foreign('instituicao_id')->references('id')->on('instituicoes');
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
        Schema::dropIfExists('participantes');
    }
}
