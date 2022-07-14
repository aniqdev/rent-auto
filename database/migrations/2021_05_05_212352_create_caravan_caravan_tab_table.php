<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanCaravanTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_caravan_tab', function (Blueprint $table) {
            $table->unsignedBigInteger('caravan_id')->index();
            $table->foreign('caravan_id')
                ->references('id')
                ->on('caravans')
                ->onDelete('cascade')
                ->unsigned();

            $table->unsignedBigInteger('caravan_tab_id')->index();
            $table->foreign('caravan_tab_id')
                ->references('id')
                ->on('caravan_tabs')
                ->onDelete('cascade')
                ->unsigned();

            $table->text('text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_caravan_tab');
    }
}
