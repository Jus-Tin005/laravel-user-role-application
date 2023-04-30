<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeatureRequest;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeaturesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::all();

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('title', 'id');
        return view('admin.features.create',compact('permissions'));
    }

    public function store(StoreFeatureRequest $request)
    {
        $feature = Feature::create($request->all());
        $feature->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.features.index');
    }

    public function edit(Feature $feature)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $feature->load('permissions');

        return view('admin.features.edit', compact('permissions', 'feature'));
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->update($request->all());
        $feature->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.features.index');
    }

    public function show(Feature $feature)
    {
        abort_if(Gate::denies('show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feature->load('permissions');
        return view('admin.features.show', compact('feature'));
    }

    public function destroy(Feature $feature)
    {
        abort_if(Gate::denies('delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feature->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeatureRequest $request)
    {
        Feature::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
