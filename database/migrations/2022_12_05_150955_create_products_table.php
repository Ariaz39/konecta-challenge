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
        Schema::create('kone_products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name', 150);
            $table->string('reference', 150);
            $table->integer('price');
            $table->integer('weight');
            $table->unsignedBigInteger('category_id');
            $table->integer('stock');
            $table->tinyInteger('status')->default(1)->comment('1: Active, 2: Inactive');

            $table->foreign('category_id')->references('category_id')->on('kone_categories');

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
