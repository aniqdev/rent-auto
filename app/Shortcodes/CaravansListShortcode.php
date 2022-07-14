<?php

namespace App\Shortcodes;

use App\Models\Caravan;
use Vedmant\LaravelShortcodes\Shortcode;

class CaravansListShortcode extends Shortcode
{
    /**
     * @var string Shortcode description
     */
    public $description = 'Caravan list by defined IDs';

    /**
     * @var array Shortcode attributes with default values
     */
    public $attributes = [
        'ids'  => [
            'default'     => '1',
            'description' => 'Caravan IDs',
            'sample'      => '1,2,3',
        ],
    ];

    /**
     * Render shortcode
     *
     * @param string $content
     * @return string
     */
    public function render($content)
    {
        $atts = $this->atts();
        $shared = $this->shared();
        $ids = $this->parseCommaSeparated($atts['ids']);
        $caravans = Caravan::whereIn('id', $ids)->get();

        return $this->view('shortcodes.caravanslist', compact('atts', 'shared', 'content', 'caravans'));
    }
}
