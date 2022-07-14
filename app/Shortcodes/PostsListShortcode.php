<?php

namespace App\Shortcodes;

use App\Models\Post;
use Vedmant\LaravelShortcodes\Shortcode;

class PostsListShortcode extends Shortcode
{
    /**
     * @var string Shortcode description
     */
    public $description = 'Posts list by IDs';

    /**
     * @var array Shortcode attributes with default values
     */
    public $attributes = [
        'ids'  => [
            'default'     => '1',
            'description' => 'Posts IDs',
            'sample'      => '1,2,3',
        ],
        'btn'  => [
            'default'     => '0',
            'description' => 'All posts link',
            'sample'      => '1',
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
        $btn_more = (!empty($atts['btn'])) ? true : false;
        $posts = Post::whereIn('id', $ids)
            ->whereNotNull('published_at')
            ->get();

        return $this->view('shortcodes.postslist', compact('atts', 'shared', 'content', 'posts', 'btn_more'));
    }
}
