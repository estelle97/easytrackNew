<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_site', function (Blueprint $table) {
        
            $table->bigInteger('site_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('min');
            $table->integer('purchase_price');
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->integer('selling_price');
            $table->integer('initial_stock');
            
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_site');
    }
}
