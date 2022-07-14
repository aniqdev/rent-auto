<?php

namespace App\Http\Controllers;

use App\Models\{Caravan, Page, Post, Dictionary, Review, ClientGallery};
use App\Models\CaravanCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\GoogleReCaptchaV3;
use Illuminate\Support\Str;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use Symfony\Component\HttpFoundation\Cookie;
// use App\Http\Controllers\Response

class HomeController extends Controller
{

    // public function setCookie(Request $request) {

    //     Cookie::queue('name', $request->test, 10);

    //     return view('home');
    //  }

    // public function setCookie(Request $request){
    //     $minutes = 60;
    //     $response = new Response('Set Cookie');
    //     $response->withCookie(cookie('name', 'MyValue', $minutes));
    //     return $response;
    //  }

    //  public function getCookie(Request $request){
    //     $value = $request->cookie('name');
    //     echo $value;
    //     return redirect()->back()->withCookie($value);
    //  }
    // public function reCaptcha()
    // {
    //     $rule = [
    //         'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('action_name')]
    //     ];

    //     GoogleReCaptchaV3::setAction($action)->verifyResponse($value,$ip = null);
    // }



    public function sitemap()
    {




        $content =  '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


        $caravans = Caravan::get(['slug', 'updated_at']);

        foreach ($caravans as $caravan){
            $content .= '<url>
            <loc>'. route('karavany.show', $caravan->slug) .'</loc>
            <lastmod>'. $caravan->updated_at->format('Y-m-d') .'</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
          </url>';
        }

        $pages = Page::get(['slug', 'updated_at']);

        foreach ($pages as $page){
            $content .= '<url>
            <loc>'. route('stranky.show', $page->slug) .'</loc>
            <lastmod>'. $page->updated_at->format('Y-m-d') .'</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
          </url>';
        }

        $posts = Post::get(['slug', 'updated_at']);

        foreach ($posts as $post){
            $content .= '<url>
            <loc>'. route('aktuality.show', $post->slug) .'</loc>
            <lastmod>'. $post->updated_at->format('Y-m-d') .'</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1.0</priority>
          </url>';
        }

        $dictionaries = Dictionary::get(['slug', 'updated_at']);

        foreach ($dictionaries as $dictionary){
            $content .= '<url>
            <loc>'. route('pojmy.show', $dictionary->slug) .'</loc>
            <lastmod>'. $dictionary->updated_at->format('Y-m-d') .'</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
          </url>';
        }



        $content .= '<url>
        <loc>'. route('home') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('karavany-kategorie.index') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('karavany-kategorie.tenerife') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('last.index') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('aktuality.index') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('pojmy.index') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('otazky.index') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('stranky.cenik') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('porovnani') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('aktuality.show', 'pujcovna-karavanu-v-praze-topobytnevozy') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('aktuality.show', 'autokempy-v-cr-a-jake-v-sezone-2022-rozhodne-navstivit') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('aktuality.show', 'objevte-svet-karavanu-a-vyhody-cestovani-s-obytnakem') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
        </url>';

        $content .= '<url>
        <loc>'. route('aktuality.show', 'karavanem-po-cesku-jak-si-naplanovat-harmonogram') .'</loc>
        <lastmod>'. date('Y-m-d') .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
        </url>';

        // route('stranky.show', 'poznejte-kanarske-ostrovy-na-maximum')

        $content .= '</urlset>';

        return response($content)->header('Content-Type', 'text/xml');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $item_class = 'active';
        $reviews = Review::where('public', '=', 1)->get();
        $galleries = ClientGallery::where('public_home', '=', 1)->get();
        // dd($reviews->toArray());
        $categories = CaravanCategory::orderBy('sort', 'ASC')->limit(4)->get();
        $caravans = Caravan::withCount('reservations')
            ->where('active', 1)
            ->where('tenerife', 0)
            ->orderBy('reservations_count', 'DESC')
            ->limit(4)
            ->get();

        $result_array = [];
        foreach ($reviews as $key => $review) {
            $item_arr = [
                'rating_service' => $review->rating_service,
            ];
            $result_array[] = $item_arr;


        }

        if ($result_array != null) {
        $res = array_column($result_array, 'rating_service');
        $res_sum = array_sum($res);
        $res_count = count($res);
        $avg_rating = $res_sum / $res_count;
        }else{
            $avg_rating = 0;
        }

        return view('home')
            ->with('categories', $categories)
            ->with('reviews', $reviews)
            ->with('item_class', $item_class)
            ->with('galleries', $galleries)
            ->with('avg_rating', $avg_rating)
            ->with('caravans', $caravans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
