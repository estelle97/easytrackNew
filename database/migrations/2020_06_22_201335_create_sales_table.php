<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantity');
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('site_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
