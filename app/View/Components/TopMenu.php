<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopMenu extends Component
{
    public $langs;
    public $lang_active;
    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $langs = [
            (object) [
                'name' => 'Česky',
                'link' => '#0',
                'active' => true,
            ],
        ];

        $items = [
            // (object) [
            //     'name' => 'Aktuality',
            //     'link' => '/aktuality',
            //     'active' => false,
            // ],
            (object) [
                'name' => 'O půjčovně',
                'link' => '/stranka/o-pujcovne',
                'active' => false,
            ],
            /* (object) [
                'name' => 'Ochrana osobních údajů',
                'link' => '/stranka/ochrana-osobnich-udaju',
                'active' => false,
            ], */
            (object) [
                'name' => 'Kontakt',
                'link' => '/stranka/kontakt',
                'active' => false,
            ]
        ];

        $this->langs = collect($langs);
        $this->lang_active = $this->langs->where('active', true)->first();
        $this->items = collect($items);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-menu');
    }
}
