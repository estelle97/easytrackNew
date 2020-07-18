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
        
            $table->integer('site_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('cost');
            $table->double('price');
            $table->integer('qty');
            $table->integer('qty_alert');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('promotion')->default(0);
            $table->double('promotion_price')->nullable();
            $table->date('promotion_start')->nullable();
            $table->date('promotion_end')->nullable();
            $table->string('tax_method')->nullable();
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
        Schema::dropIfExists('product_site');
    }
}
