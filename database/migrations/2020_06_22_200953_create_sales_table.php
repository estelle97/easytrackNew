<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->nullable();
            $table->integer('initiator')->nullable();
            $table->integer('validator')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->double('shipping_cost')->nullable();
            $table->text('sale_note')->nullable();
            $table->text('seller_note')->nullable();
            $table->string('paying_method')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
