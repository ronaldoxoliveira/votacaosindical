<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //A entidade instituições tem o CNPJ liberado pela realidade relatada pelo Eduardo: Há instituições com dois CNPJs igual e também há instituições sem CNPJ.
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj',18)->nullable();
            $table->string('nome_fantasia');    
            $table->string('razao_social');
            $table->string('logradouro_inst')->nullable();
            $table->string('localidade_inst')->nullable();
            $table->string('bairro_inst')->nullable();
            $table->string('cep_inst')->nullable();
            $table->string('uf_inst')->nullable();
            $table->string('complemento_end_inst')->nullable();
            $table->integer('tipo'); // Categoria da instituição. Creche, escola, faculdade.

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
        Schema::dropIfExists('instituicoes');
    }
}
