<?php

namespace App\Providers;

use App\Shortcodes\CaravansListShortcode;
use App\Shortcodes\PostsListShortcode;
use Illuminate\Support\ServiceProvider;
use App\Shortcodes;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Shortcodes::add([
            'caravan-list' => CaravansListShortcode::class,
            'post-list' => PostsListShortcode::class,
        ]);
    }
}
