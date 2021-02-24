<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {

            $table->bigInteger('participante_id')->unsigned();
            $table->bigInteger('chapa_id')->unsigned();
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('chapa_id')->references('id')->on('chapas');
            $table->text('audita')->nullable();
            $table->primary(['participante_id','chapa_id']);
            $table->timestamps();
        });
        DB::update("ALTER TABLE votos AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votos');
    }
}
