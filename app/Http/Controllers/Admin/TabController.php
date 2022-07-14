<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tab;
use Illuminate\Http\Request;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = Tab::withTrashed()->orderBy('sort', 'ASC')->get();

        return view('admin.tabs.index')
            ->with('tabs', $tabs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* if(!auth()->user()->hasPermissionTo('Upravit stránku')) {
            return redirect()->route('admin.dashboard');
        } */

        return view('admin.tabs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tab = new Tab;

        $tab->name = $request->name;
        $tab->text = $request->text;
        $tab->sort = 0;

        if($tab->save()) {
            flash('Otázka byla úspešně vytvořena.')->success();
        } else {
            flash('Otázku se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.otazky.index');
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
        /* if(!auth()->user()->hasPermissionTo('Upravit stránku')) {
            return redirect()->route('admin.dashboard');
        } */

        $tab = Tab::findOrFail($id);

        return view('admin.tabs.edit')
            ->with('tab', $tab);
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
        $tab = Tab::findOrFail($id);

        $tab->name = $request->name;
        $tab->text = $request->text;

        if($tab->save()) {
            flash('Otázka byla úspešně upravena.')->success();
        } else {
            flash('Otázku se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.otazky.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* if(!auth()->user()->hasPermissionTo('Smazat stránku')) {
            return redirect()->route('admin.dashboard');
        } */

        $tab = Tab::findOrFail($id);

        if($tab->delete()) {
            flash('Otázka ' . $tab->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, otázka ' . $tab->name . ' nebyla smazána.')->error();
        }

        return redirect()->route('admin.otazky.index');
    }


    public function restore($id)
    {
        /* if(!auth()->user()->hasPermissionTo('Smazat stránku')) {
            return redirect()->route('admin.dashboard');
        } */

        $tab = Tab::withTrashed()->findOrFail($id);

        if ($tab->restore()) {
            flash('Otázka ' . $tab->name . ' byla úspešně obnovena.')->success();
        } else {
            flash('Něco se pokazilo, otázka ' . $tab->name . ' nebyla obnovena.')->error();
        }

        return redirect()->route('admin.otazky.index');
    }

    /**
     * Update all sort resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSort(Request $request) {
        foreach($request->tabs as $tab) {
            $model = Tab::findOrFail($tab['id']);

            $model->sort = $tab['sort'];

            $model->save();
        }

        return response('Update Successful.', 200);
    }
}
