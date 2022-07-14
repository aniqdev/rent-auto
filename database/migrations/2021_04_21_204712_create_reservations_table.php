<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->startingValue(211000);
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('coupon_id')->nullable();
            $table->unsignedBigInteger('caravan_id');
            $table->foreign('caravan_id')
                ->references('id')->on('caravans')
                ->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('company')->nullable();
            $table->string('ico')->nullable();
            $table->string('dic')->nullable();
            $table->text('comment')->nullable();
            $table->double('discount')->default(0);
            $table->double('base_deposit');
            $table->double('base_price');
            $table->double('accessories_price');
            $table->double('total_price');
            $table->enum('payment_method', ['cash', 'bankwire']);

            $table->integer('ordered_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status_id', 'user_id', 'caravan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
