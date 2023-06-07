<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\PermissionRole;
use App\Models\Feature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RolesController extends Controller
{

    public function __construct(){
        $this->middleware('canView:role')->only(['index','show']);
        $this->middleware('canCreate:role')->only(['create','store']);
        $this->middleware('canUpdate:role')->only(['edit','update']);
        $this->middleware('canDelete:role')->only(['destroy','massDestroy']);
    }

    public function index()
    {

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));   

    }


    public function create()
    {

        $features = Feature::all();
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions','features'));

    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
       
    }

    public function edit(Role $role)
    {

        $features = Feature::all();
        $permissions = Permission::findOrFail($role->id)->get();
        $role->load('permissions');
        return view('admin.roles.edit', compact('features','permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request,Role $role)
    {      
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();
        // return response(null, Response::HTTP_NO_CONTENT);
    }
}



