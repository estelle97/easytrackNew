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
            $table->increments('id');
            $table->integer('role_id')->nullable();
            $table->string('name');
            $table->string('username');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->string('password');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_admin')->default(1);
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
