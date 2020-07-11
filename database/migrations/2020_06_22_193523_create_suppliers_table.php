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
            $table->string('email')->nullable();
            $table->string('tel1')->nullable();
            $table->string('town')->nullable();
            $table->string('street')->nullable();
            $table->string('tel2')->nullable();
            $table->enum('active', array('0', '1'))->default('1');
            $table->dateTime('created_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('site_id')
                ->references('id')
                ->on('sites')
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
        Schema::dropIfExists('suppliers');
    }
}
