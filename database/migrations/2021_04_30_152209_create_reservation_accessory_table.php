<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationAccessoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_accessory', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id')->index();
            $table->foreign('reservation_id')
                ->references('id')
                ->on('reservations')
                ->onDelete('cascade')
                ->unsigned();

            $table->unsignedBigInteger('accessory_id')->index();
            $table->foreign('accessory_id')
                ->references('id')
                ->on('accessories')
                ->onDelete('cascade')
                ->unsigned();

            $table->string('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_accessory');
    }
}
