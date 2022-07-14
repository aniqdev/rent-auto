<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanCaravanAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_caravan_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('caravan_id')->index();
            $table->foreign('caravan_id')
                ->references('id')
                ->on('caravans')
                ->onDelete('cascade')
                ->unsigned();

            $table->unsignedBigInteger('caravan_attribute_id')->index();
            $table->foreign('caravan_attribute_id')
                ->references('id')
                ->on('caravan_attributes')
                ->onDelete('cascade')
                ->unsigned();

            $table->string('value')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_caravan_attribute');
    }
}
