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
            $table->id('code');

            $table->string('product')->unique();
            $table->string('product_photo_path');
            $table->foreignId('productCategory_id');
            $table->foreignId('inventory_id');
            $table->timestamps();
            $table->softDeletes();


            //ForeignKeys
            $table->foreign('productCategory_id')->references('id')->on('product_category');

            $table->foreign('inventory_id')->references('id')->on('products_inventory');

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
