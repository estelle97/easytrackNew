<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('activity_id')->nullable()->default(1);
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('town')->nullable();
            $table->string('street')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
