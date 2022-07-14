<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountersToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->integer('deposite_counter')->default(0)->after('rest_pay_date');
            $table->integer('rest_counter')->default(0)->after('deposite_counter');
            $table->integer('total_counter')->default(0)->after('rest_counter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('deposite_counter');
            $table->dropColumn('rest_counter');
            $table->dropColumn('total_counter');
        });
    }
}
