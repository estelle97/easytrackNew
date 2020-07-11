<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('snack_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('type');
            $table->text('text');
            $table->enum('status', ['0','1'])->default('1');
            $table->string('action');
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
        Schema::dropIfExists('notifications');
    }
}
