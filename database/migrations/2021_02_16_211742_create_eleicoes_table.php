<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEleicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleicoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',60);
            $table->text('descricao')->nullable();
            $table->datetime('abertura');
            $table->datetime('encerramento');
            $table->char('status')->default('S');
            $table->timestamps();
        });
        DB::update("ALTER TABLE eleicoes AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleicoes');
    }
}
