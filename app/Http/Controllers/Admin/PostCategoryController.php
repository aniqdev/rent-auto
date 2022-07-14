<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryStoreRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::withTrashed()->paginate(20);

        return view('admin.postcategories.index')
            ->with('categories', $categories);
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

        return view('admin.postcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryStoreRequest $request)
    {
        $category = new PostCategory;

        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->seo_title = $request->seo_title;
        $category->seo_keywords = $request->seo_keywords;
        $category->seo_description = $request->seo_description;

        if($category->save()) {
            flash('Kategorie byla úspešně vytvořena.')->success();
        } else {
            flash('Kategorií se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('aktuality-kategorie.index');
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

        $category = PostCategory::findOrFail($id);

        return view('admin.postcategories.edit')
        ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryStoreRequest $request, $id)
    {
        $category = PostCategory::findOrFail($id);

        $category->user_id = Auth::id();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->seo_title = $request->seo_title;
        $category->seo_keywords = $request->seo_keywords;
        $category->seo_description = $request->seo_description;

        if ($category->save()) {
            flash('Kategorie byla úspešně upravena.')->success();
        } else {
            flash('Kategorií se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('aktuality-kategorie.index');
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

        $category = PostCategory::findOrFail($id);

        if($category->delete()) {
            flash('Kategorie ' . $category->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, kategorie ' . $category->name . ' nebyla smazána.')->error();
        }

        return redirect()->route('aktuality-kategorie.index');
    }

    public function restore($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat příspěvek')) {
            return redirect()->route('admin.dashboard');
        }

        $category = PostCategory::withTrashed()->findOrFail($id);

        if($category->restore()) {
            flash('Kategorie ' . $category->name . ' byla úspešně obnovena.')->success();
        } else {
            flash('Něco se pokazilo, kategorie ' . $category->name . ' nebyla obnovena.')->error();
        }

        return redirect()->route('aktuality-kategorie.index');
    }
}
