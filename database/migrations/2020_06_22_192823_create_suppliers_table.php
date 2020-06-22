<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->enum('is_active', array('0', '1'))->default('1');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('suppliers');
    }
}
