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
            $table->string('modelo')->nullable();
            $table->string('combustivel')->nullable();
            $table->string('cor')->nullable();
            $table->string('cilindrada')->nullable();
            $table->boolean('usado')->nullable();
            $table->integer('quantidade')->nullable();
            $table->integer('potencia')->nullable();
            $table->integer('quilometros')->nullable();
            $table->integer('ano')->nullable();
            $table->decimal('preco', 8, 2)->nullable();
            $table->integer('lugares')->nullable();
            $table->text('foto')->nullable();
            $table->integer('visualizacoes')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->text('descricao')->nullable();
            $table->string('caixa')->nullable();
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
