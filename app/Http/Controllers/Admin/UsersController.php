<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Feature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('canView:user')->only(['index','show']);
        $this->middleware('canCreate:user')->only(['create','store']);
        $this->middleware('canUpdate:user')->only(['edit','update']);
        $this->middleware('canDelete:user')->only(['destroy','massDestroy']);
    }


    public function index(){
        // $users = User::all();
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));  
    }


    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $roleIDs = $request->input('roles', []);
        
        if (!empty($roleIDs)) {
            $roleID = $roleIDs[0]; 
            $user->role_id = $roleID;
            $user->save();
        }
    
        return redirect()->route('admin.users.index');
    }
    
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $roleIDs = $request->input('roles', []);
        
        if (!empty($roleIDs)) {
            $roleID = $roleIDs[0]; 
            $user->role_id = $roleID;
            $user->save();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        // $user->delete();
        $user->forceDelete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', $request->input('ids'))->delete();
    }
}
