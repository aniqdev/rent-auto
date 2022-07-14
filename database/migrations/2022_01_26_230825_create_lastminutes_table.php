<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateLastminutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lastminutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('caravan_id');
            $table->foreign('caravan_id')
                ->references('id')->on('caravans')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('discount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $permissions = [
            'Vytvořit lastminute',
            'Upravit lastminute',
            'Smazat lastminute',
        ];

        foreach($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lastminutes');
    }
}
