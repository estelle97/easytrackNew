<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fexpenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->nullable();
            $table->string('name');
            $table->double('amount');
            $table->date('date_payment');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('fexpenses');
    }
}
