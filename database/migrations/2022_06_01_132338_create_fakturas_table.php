<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakturas', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number')->default('');
            $table->bigInteger('reservation_id')->unsigned();
            $table->tinyInteger('send_first')->nullable();
            $table->timestamps();
        });


        Schema::table('fakturas', function($table) {
            $table->foreign('reservation_id')->on('reservations')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fakturas');
    }
}
