<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarrosComprados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('carros_comprados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('carro_id')->unsigned()->index();
            $table->integer('compra_id')->unsigned()->index();
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->decimal('preco', 8, 2)->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('user_id')->unsigned()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros_comprados');
    }
}
