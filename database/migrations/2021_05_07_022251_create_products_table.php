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
            $table->increments('id_product');

            $table->string('name', 500);
            $table->float('price');
            $table->integer('type_id');
            $table->foreign('type_id')->references('type_id')->on('protypes');
            $table->integer('manu_id');
            $table->foreign('manu_id')->references('manu_id')->on('manufactures');
            $table->string('image', 1000);
            $table->string('description', 1000);
            $table->integer('hot');
            $table->integer('size');

            $table->integer('gender');
            $table->foreign('gender')->references('gender_id')->on('genders');
            $table->timestamps();
        });
    }


/**
     * rename table
     *
     * @return void
     */
    public function rename()
    {
        Schema::rename('product', 'products');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
