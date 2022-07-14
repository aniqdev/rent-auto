<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Traits\FileTrait;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    use FileTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::withTrashed()->paginate(20);

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit stránku')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = new Page;

        $page->user_id = Auth::id();
        $page->name = $request->name;
        $page->text = $request->text;
        $page->seo_title = $request->seo_title;
        $page->seo_keywords = $request->seo_keywords;
        $page->seo_description = $request->seo_description;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/pages');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $page->thumbnail = $file['path'];
            }
        }

        if($page->save()) {
            flash('Stránka byla úspešně vytvořena.')->success();
        } else {
            flash('Stránku se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.stranky.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit stránku')) {
            return redirect()->route('admin.dashboard');
        }

        $page = Page::findOrFail($id);

        return view('admin.pages.edit')
            ->with('page', $page)
            ->withoutShortcodes();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageStoreRequest $request, $id)
    {
        $page = Page::findOrFail($id);

        $page->user_id = Auth::id();
        $page->name = $request->name;
        $page->text = $request->text;
        $page->seo_title = $request->seo_title;
        $page->seo_keywords = $request->seo_keywords;
        $page->seo_description = $request->seo_description;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/pages');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $page->thumbnail = $file['path'];
            }
        }

        if($page->save()) {
            flash('Stránka byla úspešně upravena.')->success();
        } else {
            flash('Stránku se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.stranky.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat stránku')) {
            return redirect()->route('admin.dashboard');
        }

        $page = Page::findOrFail($id);

        if($page->delete()) {
            flash('Stránka ' . $page->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, stránka ' . $page->name . ' nebyla smazána.')->error();
        }

        return redirect()->route('admin.stranky.index');
    }

    public function restore($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat stránku')) {
            return redirect()->route('admin.dashboard');
        }

        $page = Page::withTrashed()->findOrFail($id);

        if ($page->restore()) {
            flash('Stránka ' . $page->name . ' byla úspešně obnovena.')->success();
        } else {
            flash('Něco se pokazilo, stránka ' . $page->name . ' nebyla obnovena.')->error();
        }

        return redirect()->route('admin.stranky.index');
    }
}
