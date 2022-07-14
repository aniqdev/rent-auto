<?php

namespace App\Http\Controllers;

use App\Models\Caravan;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




        $posts = Post::orderBy('created_at', 'DESC')
            ->whereNotNull('published_at')
            ->paginate(12);

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // if ($slug === 'autokempy-v-cr-a-jake-v-sezone-2022-rozhodne-navstivit') {
        //     return redirect('/aktuality/autokempy-v-cr-a-jake-v-sezone-2022-rozhodne-navstivit', 302);
        // }


        $post = Post::where('slug', $slug)->firstOrFail();
        $caravans = Caravan::withCount('reservations')
            ->where('active', 1)
            ->where('tenerife', 0)
            ->orderBy('reservations_count', 'DESC')
            ->limit(4)
            ->get();

        return view('posts.show')
            ->with('post', $post)
            ->with('caravans', $caravans)
            ->withShortcodes();
    }
}
