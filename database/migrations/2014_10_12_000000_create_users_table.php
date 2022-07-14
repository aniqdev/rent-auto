<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birthdate');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('company')->nullable();
            $table->string('ico')->nullable();
            $table->string('dic')->nullable();
            $table->integer('discount')->default('0');
            $table->string('password');
            $table->rememberToken();
            $table->smallInteger('verified')->default('0');
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
        Schema::dropIfExists('users');
    }
}
