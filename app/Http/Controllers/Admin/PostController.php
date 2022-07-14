<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Traits\FileTrait;
use App\Models\{File,Post,PostCategory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withTrashed()->paginate(20);

        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit příspěvek')) {
            return redirect()->route('admin.dashboard');
        }

        $categories = PostCategory::all()->pluck('name', 'id');

        return view('admin.posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post;

        $post->post_category_id = $request->post_category_id;
        $post->user_id = Auth::id();
        $post->name = $request->name;
        $post->text = $request->text;
        $post->seo_title = $request->seo_title;
        $post->seo_keywords = $request->seo_keywords;
        $post->seo_description = $request->seo_description;
        $post->published_at = ($request->active) ? now() : null;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/posts');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $post->thumbnail = $file['path'];
            }
        }

        if ($post->save()) {
            flash('Aktualita byla úspešně vytvořena.')->success();
        } else {
            flash('Aktualitu se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.aktuality.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit příspěvek')) {
            return redirect()->route('admin.dashboard');
        }

        $post = Post::findOrFail($id);
        $categories = PostCategory::all()->pluck('name', 'id');

        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->post_category_id = $request->post_category_id;
        $post->user_id = Auth::id();
        $post->name = $request->name;
        $post->text = $request->text;
        $post->seo_title = $request->seo_title;
        $post->seo_keywords = $request->seo_keywords;
        $post->seo_description = $request->seo_description;
        $post->published_at = ($request->active) ? now() : null;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/posts');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $post->thumbnail = $file['path'];
            }
        }

        if($post->save()) {
            flash('Aktualita byla úspešně upravena.')->success();
        } else {
            flash('Aktualitu se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.aktuality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat příspěvek')) {
            return redirect()->route('admin.dashboard');
        }

        $post = Post::findOrFail($id);

        if($post->delete()) {
            flash('Aktualita ' . $post->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, aktualita ' . $post->name . ' nebyla smazána.')->error();
        }

        return redirect()->route('admin.aktuality.index');
    }

    public function restore($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat příspěvek')) {
            return redirect()->route('admin.dashboard');
        }

        $post = Post::withTrashed()->findOrFail($id);

        if($post->restore()) {
            flash('Aktualita ' . $post->name . ' byla úspešně obnovena.')->success();
        } else {
            flash('Něco se pokazilo, aktualita ' . $post->name . ' nebyla obnovena.')->error();
        }

        return redirect()->route('admin.aktuality.index');
    }
}
