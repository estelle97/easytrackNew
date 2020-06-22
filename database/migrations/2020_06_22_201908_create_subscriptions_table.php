<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('snack_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->timestamp('end_date');
            $table->enum('status', array('0', '1'))->default('1');
            $table->enum('is_active', array('0', '1'))->default('1');

            $table->foreign('snack_id')->references('id')->on('snacks')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('subscriptions');
    }
}
