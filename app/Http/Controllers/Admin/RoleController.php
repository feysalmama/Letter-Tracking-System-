<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
     public function index(Request $request)
    {
        $roles = Role::orderBy('created_at', 'desc')->paginate(5);
        
        $permissions = Permission::all();
         $user = Auth::user();
          return view('admin.roles.index', compact("roles","user","permissions"));
    }



         public function create()
    {
        $permissions = Permission::all();
          return view('admin.roles.create',compact("permissions"));
    }

public function store(Request $request, Role $role)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'permissions' => 'nullable|array',
        'permissions.*' => 'integer',
    ]);

    $role = Role::create($validatedData);

    if (isset($validatedData['permissions'])) {
        $permissions = Permission::whereIn('id', $validatedData['permissions'])->get();
        $role->permissions()->sync($permissions);
    }

    $roles = Role::all();

    return view('admin.roles.index', compact('roles'));
}



 public function edit(Role $role)
    {
      $permissions = Permission::all();
          return view('admin.roles.edit',compact("role","permissions"));

    }

public function update(Role $role, Request $request)
{
    $validated = $request->validate(['name' => ['required', 'min:3'],]);
    $role->update($validated);

    $roles = Role::all(); // Retrieve all roles

    return view('admin.roles.index', compact('roles'));
}


public function destroy(Role $role)
    {
        $role->delete();
        return back();

    }

     public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }
}
