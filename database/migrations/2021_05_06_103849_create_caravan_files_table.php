<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_files', function (Blueprint $table) {
            $table->unsignedBigInteger('caravan_id')->index();
            $table->foreign('caravan_id')
                ->references('id')
                ->on('caravans')
                ->onDelete('cascade')
                ->unsigned();

            $table->unsignedBigInteger('file_id')->index();
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('cascade')
                ->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_files');
    }
}
