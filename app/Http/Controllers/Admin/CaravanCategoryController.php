<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{CaravanCategory,Caravan};
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;

class CaravanCategoryController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('Zobrazit kategorií vozidel')) {
            return redirect()->route('admin.dashboard');
        }

        $categories = CaravanCategory::orderBy('sort', 'ASC')->get();

        return view('admin.caravancategories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Upravit kategorií vozidel')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.caravancategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CaravanCategory;

        $category->name = $request->name;
        $category->count_name = $request->count_name;
        $category->license = $request->license;
        $category->persons_range = $request->persons_range;
        $category->bike_count = $request->bike_count;
        $category->shower = $request->shower;
        $category->toilet = $request->toilet;
        $category->short_description = $request->short_description ?? '';
        $category->description = $request->description ?? '';
        $category->video = $request->video;
        $category->sort = 0;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/categories');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $category->thumbnail = $file['path'];
            }
        }

        if($category->save()) {
            flash('Kategorie byla úspešně vytvořena.')->success();
        } else {
            flash('Kategorií se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.karavany-kategorie.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit kategorií vozidel')) {
            return redirect()->route('admin.dashboard');
        }

        $category = CaravanCategory::findOrFail($id);

        return view('admin.caravancategories.edit')
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
        $category = CaravanCategory::findOrFail($id);

        $category->name = $request->name;
        $category->count_name = $request->count_name;
        $category->license = $request->license;
        $category->persons_range = $request->persons_range;
        $category->bike_count = $request->bike_count;
        $category->shower = $request->shower;
        $category->toilet = $request->toilet;
        $category->short_description = $request->short_description ?? '';
        $category->description = $request->description ?? '';
        $category->video = $request->video;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/categories');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $category->thumbnail = $file['path'];
            }
        }

        if($category->save()) {
            flash('Kategorie byla úspěšně upravena.')->success();
        } else {
            flash('Kategorií se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.karavany-kategorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat kategorií vozidel')) {
            return redirect()->route('admin.dashboard');
        }

        $category = CaravanCategory::findOrFail($id);

        if ($category->delete()) {
            flash('Kategorie ' . $category->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, kategorie ' . $category->name . ' nebyl smazána.')->error();
        }

        return redirect()->route('admin.karavany-kategorie.index');
    }

    /**
     * Update all sort resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSort(Request $request) {
        foreach($request->categories as $category) {
            $model = CaravanCategory::findOrFail($category['id']);

            $model->sort = $category['sort'];

            $model->save();
        }

        return response('Update Successful.', 200);
    }
}
