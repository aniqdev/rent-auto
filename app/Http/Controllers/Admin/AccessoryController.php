<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileTrait;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessoryController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessory::with(['user', 'reservations'])->orderBy('sort', 'ASC')->get();

        return view('admin.accessories.index')
            ->with('accessories', collect($accessories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit příslušenství')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.accessories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessory = new Accessory;

        $accessory->user_id = Auth::id();
        $accessory->name = $request->name;
        $accessory->description = $request->description;
        $accessory->price_per_day = $request->price_per_day;
        $accessory->access_charge = $request->access_charge;
        $accessory->max_count = $request->max_count;
        $accessory->stock = $request->stock;
        $accessory->sort = 0;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/accessories');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $accessory->thumbnail = $file['path'];
            }
        }

        if ($accessory->save()) {
            flash('Příslušenství bylo úspešně vytvořeno.')->success();
        } else {
            flash('Příslušenství se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.prislusenstvi.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit příslušenství')) {
            return redirect()->route('admin.dashboard');
        }

        $accessory = Accessory::findOrFail($id);

        return view('admin.accessories.edit')
            ->with('accessory', $accessory);
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
        $accessory = Accessory::findOrFail($id);

        $accessory->user_id = Auth::id();
        $accessory->name = $request->name;
        $accessory->description = $request->description;
        $accessory->price_per_day = $request->price_per_day;
        $accessory->access_charge = $request->access_charge;
        $accessory->max_count = $request->max_count;
        $accessory->stock = $request->stock;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/accessories');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $accessory->thumbnail = $file['path'];
            }
        }

        if($accessory->save()) {
            flash('Příslušenství bylo úspešně upraveno.')->success();
        } else {
            flash('Příslušenství se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.prislusenstvi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat příslušenství')) {
            return redirect()->route('admin.dashboard');
        }

        $accessory = Accessory::findOrFail($id);

        if($accessory->delete()) {
            flash('Příslušenství ' . $accessory->name . ' bylo úspešně smazáno.')->success();
        } else {
            flash('Něco se pokazilo, příslušenství ' . $accessory->name . ' nebylo smazáno.')->error();
        }

        return redirect()->route('admin.prislusenstvi.index');
    }

    /**
     * Update all sort resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSort(Request $request) {
        foreach($request->accessories as $accessory) {
            $model = Accessory::findOrFail($accessory['id']);

            $model->sort = $accessory['sort'];

            $model->save();
        }

        return response('Update Successful.', 200);
    }
}
