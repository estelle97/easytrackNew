<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchase', function (Blueprint $table) {
            $table->integer('product_id')->nullable();
            $table->integer('purchase_id')->nullable();
            $table->integer('site_id')->nullable();
            $table->integer('qty');
            $table->integer('damages')->default(0);
            $table->double('cost');
            $table->tinyInteger('is_active')->default(1);
            $table->dateTime('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_purchase');
    }
}
