<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_season', function (Blueprint $table) {
            $table->unsignedBigInteger('caravan_id')->index();
            $table->foreign('caravan_id')
                ->references('id')
                ->on('caravans')
                ->onDelete('cascade')
                ->unsigned();

            $table->unsignedBigInteger('season_id')->index();
            $table->foreign('season_id')
                ->references('id')
                ->on('seasons')
                ->onDelete('cascade')
                ->unsigned();

            $table->double('day_1')->default(0);
            $table->double('day_2')->default(0);
            $table->double('day_3')->default(0);
            $table->double('day_4')->default(0);
            $table->double('day_5')->default(0);
            $table->double('day_6')->default(0);
            $table->double('day_7')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_season');
    }
}
