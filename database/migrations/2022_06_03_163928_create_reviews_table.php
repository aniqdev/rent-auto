<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reservation_id')->unsigned();
            $table->bigInteger('caravan_id')->unsigned();
            $table->string('name');
            $table->longText('recense_caravan')->nullable();
            $table->longText('recense_service')->nullable();
            $table->tinyInteger('public')->nullable();
            $table->tinyInteger('public_caravan')->nullable();
            $table->tinyInteger('rating_service')->nullable();
            $table->tinyInteger('rating_caravan')->nullable();
            $table->timestamps();
        });

        Schema::table('reviews', function($table) {
            $table->foreign('caravan_id')->on('caravans')->references('id')->onDelete('cascade');
        });


        Schema::table('reviews', function($table) {
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
        Schema::dropIfExists('reviews');
    }
}
