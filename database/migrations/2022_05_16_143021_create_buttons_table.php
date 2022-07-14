<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('reservation_id')->unsigned();
            $table->enum('action', ['caonrtact', 'bail']);
            $table->enum('status', ['on', 'off']);
            $table->timestamps();
        });

        Schema::table('buttons', function($table) {
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
        });


        Schema::table('buttons', function($table) {
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
        Schema::dropIfExists('buttons');
    }
}
