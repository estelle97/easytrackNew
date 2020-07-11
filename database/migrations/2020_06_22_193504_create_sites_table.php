<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('snack_id')->unsigned();
            $table->string('email')->nullagle();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('town')->nullable();
            $table->string('street')->nullable();
            $table->enum('active', array('0', '1'))->default('1');
            $table->dateTime('created_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('snack_id')
                ->references('id')
                ->on('snacks')
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
        Schema::dropIfExists('sites');
    }
}
