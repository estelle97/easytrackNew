<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('bill_id')->unsigned();
            $table->bigInteger('site_id')->nullable();
            $table->integer('quantity');
            $table->integer('purchase_price');
            $table->enum('status', array('0', '1'))->default('1');
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->dateTime('created_at')->useCurrent();
            $table->foreign('bill_id')
                ->references('id')
                ->on('bills')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
