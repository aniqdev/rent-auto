<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create')
            ->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;

        $role->name = $request->name;

        if($role->save()) {
            flash('Uživatelská skupina byla úspešně vytvořena.')->success();
        } else {
            flash('Uživatelskou skupinu se nepodařilo vytvořit.')->error();
        }

        foreach($request->permission as $permission) {
            $perm = Permission::where('id', $permission)->firstOrFail();
            $role->givePermissionTo($perm);
        }

        return redirect()
            ->route('skupiny.index');
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
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.edit')
            ->with('role', $role)
            ->with('permissions', $permissions);
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
        $role = Role::findOrFail($id);

        $role->name = $request->name;

        if($role->save()) {
            flash('Uživatelská skupina byla úspešně upravena.')->success();
        } else {
            flash('Uživatelskou skupinu se nepodařilo upravit.')->error();
        }

        $permissions_all = Permission::all();

        foreach ($permissions_all as $permission_all) {
            $role->revokePermissionTo($permission_all);
    	}

        foreach($request->permission as $permission) {
            $perm = Permission::where('id', $permission)->firstOrFail();

            $role->givePermissionTo($perm);
        }

        return redirect()
            ->route('skupiny.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        foreach($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }

        if($role->delete()) {
            flash('Uživatelská skupina ' . $role->name . ' byla úspešně smazána.')->success();
        } else {
            flash('Něco se pokazilo, skupina ' . $role->name . ' nebyla smazána.')->error();
        }

        return redirect()->route('skupiny.index');
    }
}
