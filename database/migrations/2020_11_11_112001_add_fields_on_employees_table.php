<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsOnEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->double('salary')->default('0')->after('cni_number');
            $table->string('paying_method')->default('cash')->after('cni_number');
            $table->integer('day_payment')->nullable()->after('cni_number');
            $table->date('start_payment')->nullable()->after('cni_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('paying_method');
            $table->dropColumn('day_payment');
            $table->dropColumn('start_payment');
        });
    }
}
