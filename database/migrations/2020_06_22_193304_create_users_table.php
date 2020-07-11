<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->nullable();
            $table->string('name');
            $table->string('username');
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('cni_number')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_tel')->nullable();
            $table->string('photo')->nullable();
            $table->string('address');
            $table->text('bio')->nullable();
            $table->string('password');
            $table->enum('active', array('0', '1'))->default('1');
            $table->enum('is_admin', array('1', '2','3'))->default('1');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
