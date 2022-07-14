<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('text');
            $table->string('thumbnail')->nullable();

            $table->string('seo_title');
            $table->string('seo_keywords');
            $table->text('seo_description');

            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index(['slug', 'user_id']);
        });

        $permissions = [
            'Vytvořit pojem',
            'Upravit pojem',
            'Smazat pojem',
        ];

        foreach($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);

            $role = Role::where('name', 'Administrátor')->first();
            $role->givePermissionTo($perm);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionaries');
    }
}
