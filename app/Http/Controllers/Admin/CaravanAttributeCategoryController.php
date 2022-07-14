<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaravanAttributeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaravanAttributeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* if(!auth()->user()->hasPermissionTo('Upravit příslušenství')) {
            return redirect()->route('admin.dashboard');
        } */

        $categories = CaravanAttributeCategory::all();

        return view('admin.caravanattributecategories.index')
            ->with('categories', $categories);
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
        $category = CaravanAttributeCategory::findOrFail($id);

        return view('admin.caravanattributecategories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* if(!auth()->user()->hasPermissionTo('Upravit příslušenství')) {
            return redirect()->route('admin.dashboard');
        } */

        $category = CaravanAttributeCategory::findOrFail($id);

        return view('admin.caravanattributecategories.edit')
            ->with('category', $category);
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
        $category = CaravanAttributeCategory::findOrFail($id);

        $category->name = $request->name;
        $category->sort = 0;

        if ($category->save()) {
            flash('Kategorie atributů byla úspešně upravena.')->success();
        } else {
            flash('Kategorií se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.karavany-vlasnosti.index');
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
