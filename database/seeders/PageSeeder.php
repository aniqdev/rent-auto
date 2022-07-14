<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'slug' => 'kontakt',
            'user_id' => 1,
            'name' => 'Kontakt',
            'text' => '<strong>Obsah</strong> stránky o nás.',
            'seo_title' => 'Kontakt',
            'seo_keywords' => 'kontakt, adresa',
            'seo_description' => 'Kontaktujte nás'
        ]);
    }
}
