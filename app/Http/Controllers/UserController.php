<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('Zobrazit uživatele')) {
            return redirect()->route('admin.dashboard');
        }

        $users = User::withTrashed()->paginate(20);

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit uživatele')) {
            return redirect()->route('admin.dashboard');
        }

        $roles = Role::all();

        return view('admin.users.create')
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'birthdate' => $request->input('birthdate'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'discount' => $request->input('discount'),
            'company' => $request->input('company'),
            'ico' => $request->input('ico'),
            'dic' => $request->input('dic'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->assignRole($request->input('role'));

        flash('Uživatel byl úspešně vytvořen.')->success();
        return redirect()->route('uzivatele.index');
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
        if(!auth()->user()->hasPermissionTo('Upravit uživatele')) {
            return redirect()->route('admin.dashboard');
        }

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate ?? null;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->discount = $request->discount;
        $user->company = $request->company;
        $user->ico = $request->ico;
        $user->dic = $request->dic;


        // $validated = $request->validate([
        //     'row.*.title' => 'required',
        //     'row.*.post' => 'required',
        // ]);



        // $messages = [
        //     'user.birthdate' => 'Fill note text',
        // ];

        // $data = $request->validate($validated , $messages);

        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->syncRoles($request->role);

        if($user->save()) {
            flash('Uživatel byl úspešně upraven.')->success();
        } else {
            flash('Uživatele se nepodařilo upravit.')->error();
        }

        return redirect()->route('uzivatele.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat uživatele')) {
            return redirect()->route('admin.dashboard');
        }

        $user = User::findOrFail($id);

        if($user->delete()) {
            flash('Uživatel ' . $user->name . ' byl úspešně smazán.')->success();
        } else {
            flash('Něco se pokazilo, uživatel ' . $user->name . ' nebyl smazán.')->error();
        }

        return redirect()->route('uzivatele.index');
    }

    public function restore($id) {
        if(!auth()->user()->hasPermissionTo('Smazat uživatele')) {
            return redirect()->route('admin.dashboard');
        }

        $user = User::withTrashed()->findOrFail($id);

        if($user->restore()) {
            flash('Uživatel ' . $user->name . ' byl úspešně obnoven.')->success();
        } else {
            flash('Něco se pokazilo, uživatel ' . $user->name . ' nebyl obnoven.')->error();
        }

        return redirect()->route('uzivatele.index');
    }
}
