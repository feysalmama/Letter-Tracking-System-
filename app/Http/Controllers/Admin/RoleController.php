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
        // $roles = Role::paginate(5);

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
     $roles = Role::all();
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



    return view('admin.roles.index', compact('roles'))->with('success', 'Role created successfully.');
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

    return view('admin.roles.index', compact('roles'))->with('success', 'Role updated successfully.');
}


public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success', 'Role deleted successfully.');

    }

     public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('success', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('success', 'Permission not exists.');
    }
}
