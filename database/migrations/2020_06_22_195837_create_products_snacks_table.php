<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsSnacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_snacks', function (Blueprint $table) {
        
            $table->bigInteger('snack_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('min');
            $table->integer('purchase_price');
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->integer('selling_price');
            $table->integer('initial_stock');
            
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('snack_id')->references('id')->on('snacks')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_snacks');
    }
}
