<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamp('start');
            
            $table->enum('status', array('1', '0'))->default('1');
            $table->dateTime('end');
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
        Schema::dropIfExists('agendas');
    }
}
