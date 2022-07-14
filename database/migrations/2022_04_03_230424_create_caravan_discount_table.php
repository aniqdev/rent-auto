<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_discount', function (Blueprint $table) {
            $table->bigInteger('discount_id')->unsigned()->index();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->bigInteger('caravan_id')->unsigned()->index();
            $table->foreign('caravan_id')->references('id')->on('caravans')->onDelete('cascade');
            $table->primary(['discount_id', 'caravan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_discount');
    }
}
