<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravanCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravan_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('count_name');
            $table->string('license');
            $table->string('persons_range');
            $table->string('bike_count');
            $table->boolean('shower');
            $table->boolean('toilet');
            $table->text('short_description');
            $table->text('description');
            $table->string('thumbnail')->nullable()->default('images/no-image.png');
            $table->string('video')->nullable();
            
            $table->integer('sort');

            $table->index(['slug']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caravan_categories');
    }
}
