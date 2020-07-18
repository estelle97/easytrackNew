<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('taxe_id')->nullable();
            $table->string('name');
            $table->string('code')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('barcode_symbology')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('products');
    }
}
