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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('marca');
            $table->string('modelo');
            $table->string('combustivel');
            $table->string('cor');
            $table->string('cilindrada');
            $table->boolean('usado');
            $table->integer('stock');
            $table->integer('ano');
            $table->decimal('preco', 8, 2);
            $table->integer('lugares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
