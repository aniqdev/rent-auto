<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{CaravanStoreRequest,CaravanUpdateRequest};
use App\Http\Traits\FileTrait;
use App\Models\{Caravan,CaravanAttribute,CaravanAttributeCategory,CaravanCategory,CaravanTab,File,Season};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaravanController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('Zobrazit vozidla')) {
            return redirect()->route('admin.dashboard');
        }

        $caravans = Caravan::with(['user', 'caravan_category', 'reservations'])->withTrashed()->orderBy('sort', 'ASC')->get();

                        // $data = table1::where('id', $id)
        //     ->with(['listfile' => function($query){
        //         $query->select('filename', 'rid');
        //     }])
        //     ->orderBy('date', 'DESC')->get()->toArray();

        // $cara = Caravan::with(['user', 'reservations'])->withTrashed()->orderBy('sort', 'ASC')->get()->toArray();

        // $cara = Caravan::with(['reservations' => function($query){
        //         $query->select('start_date', 'id');
        // }])
        // ->orderBy('sort', 'ASC')->get();


        // $cara = Caravan::with(['reservations'])->with('reservations')->withTrashed()->orderBy('sort', 'ASC')->get()->toArray();



        // dd($cara['reservations']);

        return view('admin.caravans.index')
            ->with('caravans', collect($caravans));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit vozidlo')) {
            return redirect()->route('admin.dashboard');
        }

        $categories = CaravanCategory::all()->pluck('name', 'id');
        $seasons = Season::all();
        $tabs = CaravanTab::orderBy('sort', 'ASC')->get();

        return view('admin.caravans.create')
            ->with('categories', $categories)
            ->with('seasons', $seasons)
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaravanStoreRequest $request)
    {
        $caravan = new Caravan;
        $seasons = Season::all();
        $tabs = CaravanTab::all();

        $caravan->caravan_category_id = $request->caravan_category_id;
        $caravan->user_id = Auth::id();
        $caravan->name = $request->name;
        $caravan->subtitle = $request->subtitle ?? '';
        $caravan->charasteristics = $request->charasteristics ?? '';
        $caravan->short_description = $request->short_description ?? '';
        $caravan->description = $request->description ?? '';
        $caravan->video = $request->video;
        $caravan->spz = $request->spz ?? '';
        $caravan->model = $request->model;
        $caravan->type = $request->type;
        $caravan->year = $request->year;
        $caravan->driving_license = $request->driving_license;
        $caravan->color = $request->color;
        $caravan->width = $request->width;
        $caravan->height = $request->height;
        $caravan->length = $request->length;
        $caravan->weight = $request->weight;
        $caravan->climatization = $request->climatization;
        $caravan->heating = $request->heating;
        $caravan->platform = $request->platform;
        $caravan->transmission = $request->transmission;
        $caravan->motor = $request->motor;
        $caravan->power = $request->power;
        $caravan->emission = $request->emission;
        $caravan->fuel = $request->fuel;
        $caravan->fuel_tank = $request->fuel_tank;
        $caravan->seats = $request->seats;
        $caravan->beds = $request->beds;
        $caravan->blinds = $request->blinds;
        $caravan->awning = $request->awning;
        $caravan->security = $request->security;
        $caravan->cruise_control = $request->cruise_control;
        $caravan->electric_equipment = $request->electric_equipment;
        $caravan->audio_video = $request->audio_video;
        $caravan->fridge_volume = $request->fridge_volume;
        $caravan->hotplate = $request->hotplate;
        $caravan->basin = $request->basin;
        $caravan->shower = $request->shower;
        $caravan->toilet = $request->toilet;
        $caravan->water_tank = $request->water_tank;
        $caravan->waste_tank = $request->waste_tank;
        $caravan->bike_carrier = $request->bike_carrier;
        $caravan->converter = $request->converter;
        $caravan->outdoor_lights = $request->outdoor_lights;
        $caravan->highway_sign = $request->highway_sign;
        $caravan->furniture = $request->furniture;
        $caravan->winter = $request->winter ?? 0;
        $caravan->tenerife = $request->tenerife ?? 0;
        $caravan->concern = $request->concern;
        $caravan->key_benefits = $request->key_benefits ?? '';
        $caravan->living_comfort = $request->living_comfort ?? 0;
        $caravan->driving_comfort = $request->driving_comfort ?? 0;
        $caravan->equipment = $request->equipment ?? 0;
        $caravan->operating_costs = $request->operating_costs ?? 0;
        $caravan->accessories = $request->accessories ?? 0;
        $caravan->seo_title = $request->seo_title ?? '';
        $caravan->seo_keywords = $request->seo_keywords ?? '';
        $caravan->seo_description = $request->seo_description ?? '';
        $caravan->active = ($request->active) ? 1 : 0;
        $caravan->sort = 0;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads/caravans');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $caravan->thumbnail = $file['path'];
            }
        }

        $floor_plans = $this->uploadFile($request, 'floor_plan', 'uploads/caravans');

        if($request->hasFile('floor_plan')) {
            foreach($floor_plans as $floor_plan) {
                $caravan->floor_plan = $floor_plan['path'];
            }
        }

        $caravan->save();

        foreach($tabs as $tab) {
            $caravan->tabs()->attach($tab->id, [
                'text' => $request->tab[$tab->id],
            ]);
        }

        foreach($seasons as $season) {
            $caravan->seasons()->attach($season->id, [
                'day_1' => $request->day[$season->id][1] ?? 0,
                'day_2' => $request->day[$season->id][2] ?? 0,
                'day_3' => $request->day[$season->id][3] ?? 0,
                'day_4' => $request->day[$season->id][4] ?? 0,
                'day_5' => $request->day[$season->id][5] ?? 0,
                'day_6' => $request->day[$season->id][6] ?? 0,
                'day_7' => $request->day[$season->id][7] ?? 0,
            ]);
        }

        $photos = $this->uploadFile($request, 'photos', 'uploads', true);

        if($request->hasFile('photos')) {
            foreach($photos as $photo) {
                $caravan->photos()->create([
                    'user_id' => Auth::id(),
                    'name' => $photo['path'],
                    'extension' => $photo['extension'],
                    'size' => $photo['size'],
                    'path' => $photo['path'],
                    'thumbnail' => $photo['thumbnail'],
                ]);
            }
        }

        if($caravan->id !== null && !empty($caravan->id)) {
            flash('Karavan byl úspešně vytvořen. Prohlédnout si ho můžete <a href="' . route('karavany.show', $caravan->slug) . '" target="__blank">zde</a>.')->success();
        } else {
            flash('Karavan se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.karavany.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caravan = Caravan::findOrFail($id);

        return view('admin.caravans.show')
            ->with('caravan', $caravan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('Upravit vozidlo')) {
            return redirect()->route('admin.dashboard');
        }

        $caravan = Caravan::findOrFail($id);
        $categories = CaravanCategory::all()->pluck('name', 'id');
        $seasons = Season::all();
        $tabs = CaravanTab::orderBy('sort', 'ASC')->get();

        return view('admin.caravans.edit')
            ->with('caravan', $caravan)
            ->with('categories', $categories)
            ->with('seasons', $seasons)
            ->with('tabs', $tabs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CaravanUpdateRequest $request, $id)
    {
        $caravan = Caravan::findOrFail($id);
        $seasons = Season::all();
        $tabs = CaravanTab::all();

        $caravan->caravan_category_id = $request->caravan_category_id;
        $caravan->user_id = Auth::id();
        $caravan->name = $request->name;
        $caravan->subtitle = $request->subtitle ?? '';
        $caravan->charasteristics = $request->charasteristics ?? '';
        $caravan->short_description = $request->short_description ?? '';
        $caravan->description = $request->description ?? '';
        $caravan->video = $request->video;
        $caravan->spz = $request->spz ?? '';
        $caravan->model = $request->model;
        $caravan->type = $request->type;
        $caravan->year = $request->year;
        $caravan->driving_license = $request->driving_license;
        $caravan->color = $request->color;
        $caravan->width = $request->width;
        $caravan->height = $request->height;
        $caravan->length = $request->length;
        $caravan->weight = $request->weight;
        $caravan->climatization = $request->climatization;
        $caravan->heating = $request->heating;
        $caravan->platform = $request->platform;
        $caravan->transmission = $request->transmission;
        $caravan->motor = $request->motor;
        $caravan->power = $request->power;
        $caravan->emission = $request->emission;
        $caravan->fuel = $request->fuel;
        $caravan->fuel_tank = $request->fuel_tank;
        $caravan->seats = $request->seats;
        $caravan->beds = $request->beds;
        $caravan->blinds = $request->blinds;
        $caravan->awning = $request->awning;
        $caravan->security = $request->security;
        $caravan->cruise_control = $request->cruise_control;
        $caravan->electric_equipment = $request->electric_equipment;
        $caravan->audio_video = $request->audio_video;
        $caravan->fridge_volume = $request->fridge_volume;
        $caravan->hotplate = $request->hotplate;
        $caravan->basin = $request->basin;
        $caravan->shower = $request->shower;
        $caravan->toilet = $request->toilet;
        $caravan->water_tank = $request->water_tank;
        $caravan->waste_tank = $request->waste_tank;
        $caravan->bike_carrier = $request->bike_carrier;
        $caravan->converter = $request->converter;
        $caravan->outdoor_lights = $request->outdoor_lights;
        $caravan->highway_sign = $request->highway_sign;
        $caravan->furniture = $request->furniture;
        $caravan->winter = $request->winter ?? 0;
        $caravan->tenerife = $request->tenerife ?? 0;
        $caravan->concern = $request->concern;
        $caravan->key_benefits = $request->key_benefits ?? '';
        $caravan->living_comfort = $request->living_comfort ?? 0;
        $caravan->driving_comfort = $request->driving_comfort ?? 0;
        $caravan->equipment = $request->equipment ?? 0;
        $caravan->operating_costs = $request->operating_costs ?? 0;
        $caravan->accessories = $request->accessories ?? 0;
        $caravan->seo_title = $request->seo_title ?? '';
        $caravan->seo_keywords = $request->seo_keywords ?? '';
        $caravan->seo_description = $request->seo_description ?? '';
        $caravan->active = ($request->active) ? 1 : 0;

        $files = $this->uploadFile($request, 'thumbnail', 'uploads');

        if($request->hasFile('thumbnail')) {
            foreach($files as $file) {
                $caravan->thumbnail = $file['path'];
            }
        }

        $floor_plans = $this->uploadFile($request, 'floor_plan', 'uploads');

        if($request->hasFile('floor_plan')) {
            foreach($floor_plans as $floor_plan) {
                $caravan->floor_plan = $floor_plan['path'];
            }
        }

        $caravan->save();

        foreach($seasons as $season) {
            $caravan->seasons()->detach($season->id);
            $caravan->seasons()->attach($season->id, [
                'day_1' => $request->day[$season->id][1] ?? 0,
                'day_2' => $request->day[$season->id][2] ?? 0,
                'day_3' => $request->day[$season->id][3] ?? 0,
                'day_4' => $request->day[$season->id][4] ?? 0,
                'day_5' => $request->day[$season->id][5] ?? 0,
                'day_6' => $request->day[$season->id][6] ?? 0,
                'day_7' => $request->day[$season->id][7] ?? 0,
            ]);
        }

        foreach($tabs as $tab) {
            $caravan->tabs()->detach($tab->id);
            $caravan->tabs()->attach($tab->id, [
                'text' => $request->tab[$tab->id],
            ]);
        }

        $photos = $this->uploadFile($request, 'photos', 'uploads', true);

        if($request->hasFile('photos')) {
            foreach($photos as $photo) {
                $caravan->photos()->create([
                    'user_id' => Auth::id(),
                    'name' => $photo['path'],
                    'extension' => $photo['extension'],
                    'size' => $photo['size'],
                    'path' => $photo['path'],
                    'thumbnail' => $photo['thumbnail'],
                ]);
            }
        }

        if($caravan->id !== null && !empty($caravan->id)) {
            flash('Karavan byl úspešně upraven. Prohlédnout si ho můžete <a href="' . route('karavany.show', $caravan->slug) . '" target="__blank">zde</a>.')->success();
        } else {
            flash('Karavan se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.karavany.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat vozidlo')) {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Update all sort resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSort(Request $request) {
        foreach($request->caravans as $caravan) {
            $model = Caravan::findOrFail($caravan['id']);

            $model->sort = $caravan['sort'];

            $model->save();
        }

        return response('Update Successful.', 200);
    }

    /**
     * Update all sort resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSortPhoto(Request $request) {
        foreach($request->photos as $photo) {
            $model = Caravan::findOrFail($photo['pivot']['caravan_id']);
            $file = File::findOrFail($photo['id']);

            $relation = $model->photos()->updateExistingPivot($file, ['sort' => $photo['pivot']['sort']]);
        }

        return response('Update Successful.', 200);
    }

    /**
     * Destroy photo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyPhoto(Request $request) {
        $caravan = Caravan::findOrFail($request->caravan);

        if($caravan->photos->where('id', $request->photo)->first()->delete())
            return response('Update Successful.', 200);
        else
            return response('Error.', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function copy()
    {
        $caravans = Caravan::all();

        return view('admin.caravans.copy')
            ->with('caravans', $caravans);
    }

    public function duplicate(Request $request) {
        $original_caravan = Caravan::findOrFail($request->caravan_id);

        $caravan = new Caravan;

        $caravan->caravan_category_id = $original_caravan->caravan_category_id;
        $caravan->user_id = Auth::id();
        $caravan->name = $request->new_name;
        $caravan->subtitle = $original_caravan->subtitle ?? '';
        $caravan->charasteristics = $original_caravan->charasteristics ?? '';
        $caravan->short_description = $original_caravan->short_description ?? '';
        $caravan->description = $original_caravan->description ?? '';
        $caravan->thumbnail = $original_caravan->thumbnail;
        $caravan->floor_plan = $original_caravan->floor_plan;
        $caravan->video = $original_caravan->video;
        $caravan->spz = $request->new_spz;
        $caravan->model = $original_caravan->model;
        $caravan->type = $original_caravan->type;
        $caravan->year = $original_caravan->year;
        $caravan->driving_license = $original_caravan->driving_license;
        $caravan->color = $original_caravan->color;
        $caravan->width = $original_caravan->width;
        $caravan->height = $original_caravan->height;
        $caravan->length = $original_caravan->length;
        $caravan->weight = $original_caravan->weight;
        $caravan->climatization = $original_caravan->climatization;
        $caravan->heating = $original_caravan->heating;
        $caravan->platform = $original_caravan->platform;
        $caravan->transmission = $original_caravan->transmission;
        $caravan->motor = $original_caravan->motor;
        $caravan->power = $original_caravan->power;
        $caravan->emission = $original_caravan->emission;
        $caravan->fuel = $original_caravan->fuel;
        $caravan->fuel_tank = $original_caravan->fuel_tank;
        $caravan->seats = $original_caravan->seats;
        $caravan->beds = $original_caravan->beds;
        $caravan->blinds = $original_caravan->blinds;
        $caravan->awning = $original_caravan->awning;
        $caravan->security = $original_caravan->security;
        $caravan->cruise_control = $original_caravan->cruise_control;
        $caravan->electric_equipment = $original_caravan->electric_equipment;
        $caravan->audio_video = $original_caravan->audio_video;
        $caravan->fridge_volume = $original_caravan->fridge_volume;
        $caravan->hotplate = $original_caravan->hotplate;
        $caravan->basin = $original_caravan->basin;
        $caravan->shower = $original_caravan->shower;
        $caravan->toilet = $original_caravan->toilet;
        $caravan->water_tank = $original_caravan->water_tank;
        $caravan->waste_tank = $original_caravan->waste_tank;
        $caravan->bike_carrier = $original_caravan->bike_carrier;
        $caravan->converter = $original_caravan->converter;
        $caravan->outdoor_lights = $original_caravan->outdoor_lights;
        $caravan->highway_sign = $original_caravan->highway_sign;
        $caravan->furniture = $original_caravan->furniture;
        $caravan->winter = $original_caravan->winter ?? 0;
        $caravan->tenerife = $original_caravan->tenerife ?? 0;
        $caravan->concern = $original_caravan->concern;
        $caravan->key_benefits = $original_caravan->key_benefits ?? '';
        $caravan->living_comfort = $original_caravan->living_comfort ?? 0;
        $caravan->driving_comfort = $original_caravan->driving_comfort ?? 0;
        $caravan->equipment = $original_caravan->equipment ?? 0;
        $caravan->operating_costs = $original_caravan->operating_costs ?? 0;
        $caravan->accessories = $original_caravan->accessories ?? 0;
        $caravan->seo_title = $original_caravan->seo_title ?? '';
        $caravan->seo_keywords = $original_caravan->seo_keywords ?? '';
        $caravan->seo_description = $original_caravan->seo_description ?? '';
        $caravan->active = ($original_caravan->active) ? 1 : 0;
        $caravan->sort = 0;

        $caravan->save();

        foreach($original_caravan->tabs()->get() as $original_tab) {
            $caravan->tabs()->attach($original_tab->id, [
                'text' => $original_tab->pivot->text,
            ]);
        }

        foreach($original_caravan->seasons()->get() as $original_season) {
            $caravan->seasons()->attach($original_season->id, [
                'day_1' => $original_season->pivot->day_1,
                'day_2' => $original_season->pivot->day_2,
                'day_3' => $original_season->pivot->day_3,
                'day_4' => $original_season->pivot->day_4,
                'day_5' => $original_season->pivot->day_5,
                'day_6' => $original_season->pivot->day_6,
                'day_7' => $original_season->pivot->day_7,
            ]);
        }

        foreach($original_caravan->photos()->get() as $original_photo) {
            $caravan->photos()->attach($original_photo->id, [
                'sort' => $original_photo->pivot->sort,
            ]);
        }

        if ($caravan->id !== null && !empty($caravan->id)) {
            flash('Karavan byl úspešně vytvořen. Prohlédnout si ho můžete <a href="' . route('karavany.show', $caravan->slug) . '" target="__blank">zde</a>.')->success();
        } else {
            flash('Karavan se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.karavany.index');
    }
}
