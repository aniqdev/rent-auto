<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_galleries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reservation_id')->unsigned();
            // $table->bigInteger('caravan_id')->unsigned();
            $table->string('url')->nullable();
            $table->tinyInteger('public_home')->nullable();
            $table->tinyInteger('public_caravan')->nullable();
            $table->timestamps();
        });


        // Schema::table('client_galleries', function($table) {
        //     $table->foreign('caravan_id')->on('caravans')->references('id')->onDelete('cascade');
        // });


        Schema::table('client_galleries', function($table) {
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
        Schema::dropIfExists('client_galleries');
    }
}
