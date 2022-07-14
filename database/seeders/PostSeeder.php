<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = PostCategory::create([
            'slug' => 'novinky',
            'user_id' => 1,
            'name' => 'Novinky',
            'description' => 'Novinky popis',
            'seo_title' => 'Novinky',
            'seo_keywords' => 'novinky, články',
            'seo_description' => 'Novinky popis'
        ]);

        $post = Post::create([
            'slug' => 'vitejte',
            'post_category_id' => 1,
            'user_id' => 1,
            'name' => 'Vítejte na nových webových stránkách',
            'text' => '<strong>Obsah</strong> aktuality.',
            'seo_title' => 'Vítejte na nových webových stránkách',
            'seo_keywords' => 'novinka, vitejte, nove, webove, stranky',
            'seo_description' => 'Nové webové stránky'
        ]);
    }
}
