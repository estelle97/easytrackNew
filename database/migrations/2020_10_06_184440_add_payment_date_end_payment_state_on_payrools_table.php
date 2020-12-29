<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentDateEndPaymentStateOnPayroolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payrools', function (Blueprint $table) {
            $table->date('date_payment')->comment('Date de début de paiement');
            $table->date('end_payement')->comment('Date de fin de paiement');
            $table->integer('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payrools', function (Blueprint $table) {
            $table->dropColumn('date_payment');
            $table->dropColumn('end_payment');
            $table->dropColumn('status');
        });
    }
}
