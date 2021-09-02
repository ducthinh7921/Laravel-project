<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('strap_id')->unsigned();
            $table->foreign('strap_id')->references('id')->on('strap');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('discount');
            $table->string('product_image');
            $table->string('product_image2');
            $table->string('product_image3');
            $table->string('product_image4');
            $table->text('content');
            $table->integer('gender');
            $table->string('case_size');
            $table->string('loai_kinh');
            $table->string('Wateproof');
            $table->string('origin');
            $table->integer('status');
            $table->integer('pay');  
            $table->string('guarantee');
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
        Schema::dropIfExists('product');
    }
}
