<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class GlobalViewVariableServiceProvider extends ServiceProvider
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
        $main_menu_items = [
            /* (object) [
                'name' => 'Domů',
                'route' => 'home',
                'active' => 'home',
            ], */
            (object) [
                'name' => 'Půjčovna Praha',
                'route' => 'karavany-kategorie.index',
                'active' => 'karavany-kategorie.index',
            ],
            (object) [
                'name' => 'Půjčovna Tenerife',
                'route' => 'karavany-kategorie.tenerife',
                'active' => 'karavany-kategorie.tenerife',
                'class' => 'summer',
            ],

            (object) [
                'name' => 'Last Minute',
                'route' => 'last.index',
                'active' => 'last.index',
                'class' => 'sale',
            ],
            // (object) [
            //     'name' => 'Vozový park',
            //     'route' => 'karavany-kategorie.index',
            //     'active' => 'karavany-kategorie.*',
            // ],
            // (object) [
            //     'name' => 'Kanárské ostrovy',
            //     'route' => 'stranky.show',
            //     'item' => 'poznejte-kanarske-ostrovy-na-maximum',
            //     'class' => 'summer',
            //     'active' => 'stranky',
            // ],
            /* (object) [
                'name' => 'Zimní sezóna',
                'route' => 'stranky.show',
                'item' => 'zimni-sezona',
                'class' => 'winter',
                'active' => 'stranky',
            ], */
            (object) [
                'name' => 'Aktuality',
                'route' => 'aktuality.index',
                'active' => 'aktuality.*',
            ],
            (object) [
                'name' => 'Rady a informace',
                'route' => 'otazky.index',
                'active' => 'otazky.*',
            ],
            (object) [
                'name' => 'Ceník',
                'route' => 'stranky.cenik',
                'active' => 'stranky.cenik.*',
            ],
            /* (object) [
                'name' => 'Kontakt',
                'route' => 'stranky.show',
                'item' => 'kontakt',
                'active' => 'stranky',
            ], */
        ];

        $footer_menu1_items = [
            (object) [
                'name' => 'Domů',
                'route' => 'home',
                'active' => 'home',
            ],
            (object) [
                'name' => 'Půjčovna Praha',
                'route' => 'karavany-kategorie.index',
                'active' => 'karavany-kategorie.index',
            ],
            (object) [
                'name' => 'Půjčovna Tenerife',
                'route' => 'karavany-kategorie.tenerife',
                'active' => 'karavany-kategorie.tenerife',
                'class' => 'summer',
            ],
            (object) [
                'name' => 'Aktuality',
                'route' => 'aktuality.index',
                'active' => 'aktuality.*',
            ],
            (object) [
                'name' => 'Rady a informace',
                'route' => 'otazky.index',
                'active' => 'otazky.*',
            ],
            (object) [
                'name' => 'Kontakt',
                'route' => 'stranky.show',
                'item' => 'kontakt',
                'active' => 'stranky',
            ],
        ];

        $footer_menu2_items = [
            (object) [
                'name' => 'O půjčovně',
                'route' => 'stranky.show',
                'item' => 'o-pujcovne',
                'active' => 'stranky',
            ],
            (object) [
                'name' => 'Ochrana osobních údajů',
                'route' => 'stranky.show',
                'item' => 'ochrana-osobnich-udaju',
                'active' => 'stranky',
            ],
            (object) [
                'name' => 'Slovník pojmů',
                'route' => 'pojmy.index',
                'active' => 'pojmy.*',
            ],
        ];

        view()->share('main_menu_items', $main_menu_items);
        view()->share('footer_menu1', $footer_menu1_items);
        view()->share('footer_menu2', $footer_menu2_items);
    }
}
