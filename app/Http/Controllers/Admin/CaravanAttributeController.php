<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{CaravanAttribute,CaravanAttributeCategory};
use Attribute;
use Illuminate\Http\Request;

class CaravanAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* if(!auth()->user()->hasPermissionTo('Upravit příslušenství')) {
            return redirect()->route('admin.dashboard');
        } */

        return view('admin.caravanattributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = CaravanAttributeCategory::findOrFail($request->category);

        $category->attributes()->create([
            'slug' => $request->slug,
            'name' => $request->name,
        ]);

        flash('Stránka byla úspešně vytvořena.')->success();

        return redirect()
            ->route('admin.karavany-vlasnosti.show', $category->id);
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
        /* if(!auth()->user()->hasPermissionTo('Upravit příslušenství')) {
            return redirect()->route('admin.dashboard');
        } */

        $attribute = CaravanAttribute::findOrFail($id);

        return view('admin.caravanattributes.edit')
            ->with('attribute', $attribute);
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
        $attribute = CaravanAttribute::findOrFail($id);

        $attribute->slug = $request->slug;
        $attribute->name = $request->name;

        if ($attribute->save()) {
            flash('Atribut byl úspešně upraven.')->success();
        } else {
            flash('Atribut se nepodařilo upravit.')->error();
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
