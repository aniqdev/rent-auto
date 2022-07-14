<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravans', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            /* $table->integer('parent_id')->unsigned()->nullable(); */
            $table->unsignedBigInteger('caravan_category_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('subtitle');
            $table->string('charasteristics');
            $table->text('short_description');
            $table->text('description');
            $table->string('thumbnail')->nullable()->default('images/no-image.png');
            $table->string('floor_plan')->nullable();
            $table->string('video')->nullable();
            $table->string('spz');

            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('driving_license')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('length')->nullable();
            $table->integer('weight')->nullable();
            $table->string('climatization')->nullable();
            $table->string('platform')->nullable();
            $table->string('color')->nullable();
            $table->string('motor')->nullable();
            $table->integer('power')->nullable();
            $table->string('emission')->nullable();
            $table->string('fuel')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_tank')->nullable();

            $table->string('security')->nullable();
            $table->string('cruise_control')->nullable();
            $table->string('electric_equipment')->nullable();
            $table->string('audio_video')->nullable();
            $table->string('gps')->nullable();

            $table->integer('beds')->nullable();
            $table->integer('seats')->nullable();
            $table->string('heating')->nullable();
            $table->string('fridge_volume')->nullable();
            $table->string('hotplate')->nullable();
            $table->string('basin')->nullable();
            $table->string('shower')->nullable();
            $table->string('toilet')->nullable();
            $table->string('water_tank')->nullable();
            $table->string('waste_tank')->nullable();
            $table->string('bike_carrier')->nullable();
            $table->string('awning')->nullable();
            $table->string('blinds')->nullable();
            $table->string('converter')->nullable();
            $table->string('outdoor_lights')->nullable();
            $table->string('highway_sign')->nullable();
            $table->string('furniture')->nullable();

            $table->text('key_benefits');
            $table->smallInteger('living_comfort')->default(0);
            $table->smallInteger('driving_comfort')->default(0);
            $table->smallInteger('equipment')->default(0);
            $table->smallInteger('operating_costs')->default(0);

            /* $table->text('specifications');
            $table->text('cabin');
            $table->text('residential');
            $table->text('additional');
            $table->text('services'); */

            $table->string('seo_title');
            $table->string('seo_keywords');
            $table->text('seo_description');

            $table->integer('sort');
            $table->boolean('active')->default(1);

            /* Photos,  */

            /* $table->index(['slug', 'parent_id', 'caravan_category_id', 'user_id']); */
            $table->index(['slug', 'caravan_category_id', 'user_id']);

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
        Schema::dropIfExists('caravans');
    }
}
