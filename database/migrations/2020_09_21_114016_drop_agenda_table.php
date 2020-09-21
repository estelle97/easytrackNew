<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // drop the table
        Schema::dropIfExists('agendas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigInteger('site_id');
            $table->bigInteger('user_id');
            $table->dateTime('start');
            $table->enum('status', array('1', '0'))->default('1');
            $table->dateTime('end');
            $table->dateTime('created_at')->useCurrent();
            $table->softDeletes();
        });
    }
}
