<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Feature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::all();
        $permissions = Permission::all()->pluck('title', 'id');
        return view('admin.roles.create', compact('permissions','features'));
    }

    public function store(StoreFeatureRequest $request,Role $role, Feature $feature)
    {

            $role = Role::create($request->all());
            $role->permissions()->sync($request->input('permissions', []));
    
            $feature = Feature::create($request->all());
            $feature->permissions()->sync($request->input('permissions', []));
    
            return redirect()->route('admin.roles.index');
       
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');
    
       
        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateFeatureRequest $request,Role $role, Feature $feature)
    {
       
            $role->update($request->all());
            $role->permissions()->sync($request->input('permissions', []));
    
            $feature = Feature::create($request->all());
            $feature->permissions()->sync($request->input('permissions', []));
    
            return redirect()->route('admin.roles.index');

    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
