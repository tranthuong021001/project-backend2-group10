<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill__details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('amount');
            
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
        Schema::dropIfExists('bill__details');
    }
}
