<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('marca_id')->unsigned()->index();
            $table->string('modelo');
            $table->string('combustivel');
            $table->string('cor');
            $table->string('cilindrada');
            $table->boolean('usado');
            $table->integer('quantidade');
            $table->integer('potencia');
            $table->integer('quilometros');
            $table->integer('ano');
            $table->decimal('preco', 8, 2);
            $table->integer('lugares');
            $table->text('foto');
            $table->integer('visualizacoes');
            $table->integer('user_id')->unsigned()->index();
            $table->text('descricao');
            $table->string('caixa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
