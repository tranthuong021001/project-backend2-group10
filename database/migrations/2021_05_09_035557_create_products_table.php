<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price');
            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('protypes');
            $table->integer('manu_id');
            $table->foreign('manu_id')->references('id')->on('manufactures');
            $table->string('description');
            $table->integer('sale');
            $table->integer('size');
            $table->integer('gender');
            $table->foreign('gender')->references('id')->on('genders');
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
        Schema::dropIfExists('products');
    }
}
