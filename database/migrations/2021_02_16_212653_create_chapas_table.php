<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateChapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('eleicoe_id')->unsigned();
            $table->string('nome',60);
            $table->string('resenha');
            $table->text('detalhamento')->nullable();
            $table->foreign('eleicoe_id')->references('id')->on('eleicoes');
            $table->timestamps();
        });

        DB::update("ALTER TABLE chapas AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapas');
    }
}
