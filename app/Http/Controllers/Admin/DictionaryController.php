<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DictionaryStoreRequest;
use App\Http\Traits\FileTrait;
use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DictionaryController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionaries = Dictionary::withTrashed()->paginate(20);

        return view('admin.dictionaries.index')
            ->with('dictionaries', $dictionaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit pojem')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.dictionaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DictionaryStoreRequest $request)
    {
        $dictionary = new Dictionary();

        $dictionary->user_id = Auth::id();
        $dictionary->name = $request->name;
        $dictionary->text = $request->text;
        $dictionary->seo_title = $request->seo_title;
        $dictionary->seo_keywords = $request->seo_keywords;
        $dictionary->seo_description = $request->seo_description;
        $dictionary->published_at = ($request->active) ? now() : null;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/dictionaries');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $dictionary->thumbnail = $file['path'];
            }
        }

        if($dictionary->save()) {
            flash('Pojem byl úspešně vytvořen.')->success();
        } else {
            flash('Pojem se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.slovnik.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit pojem')) {
            return redirect()->route('admin.dashboard');
        }

        $dictionary = Dictionary::findOrFail($id);

        return view('admin.dictionaries.edit')
            ->with('dictionary', $dictionary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DictionaryStoreRequest $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);

        $dictionary->user_id = Auth::id();
        $dictionary->name = $request->name;
        $dictionary->text = $request->text;
        $dictionary->seo_title = $request->seo_title;
        $dictionary->seo_keywords = $request->seo_keywords;
        $dictionary->seo_description = $request->seo_description;
        $dictionary->published_at = ($request->published_at) ? now() : null;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/dictionaries');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $dictionary->thumbnail = $file['path'];
            }
        }

        if($dictionary->save()) {
            flash('Pojem byl úspešně upraven.')->success();
        } else {
            flash('Pojem se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.slovnik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat pojem')) {
            return redirect()->route('admin.dashboard');
        }

        $dictionary = Dictionary::findOrFail($id);

        if($dictionary->delete()) {
            flash('Pojem ' . $dictionary->name . ' byl úspešně smazán.')->success();
        } else {
            flash('Něco se pokazilo, pojem ' . $dictionary->name . ' nebyl smazán.')->error();
        }

        return redirect()->route('admin.slovnik.index');
    }

    public function restore($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat pojem')) {
            return redirect()->route('admin.dashboard');
        }

        $dictionary = Dictionary::withTrashed()->findOrFail($id);

        if($dictionary->restore()) {
            flash('Pojem ' . $dictionary->name . ' byl úspešně obnoven.')->success();
        } else {
            flash('Něco se pokazilo, pojem ' . $dictionary->name . ' nebyl obnoven.')->error();
        }

        return redirect()->route('admin.slovnik.index');
    }
}
