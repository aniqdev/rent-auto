<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caravan_id');
            $table->foreign('caravan_id')
                ->references('id')->on('caravans')
                ->onDelete('cascade');
            $table->string('email')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('price')->nullable();
            $table->integer('reason');
            $table->text('message')->nullable();
            $table->string('ip')->nullable();
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_forms');
    }
}
