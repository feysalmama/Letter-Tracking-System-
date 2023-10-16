<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
public function index(Request $request)
{

      $departments = Department::all();
        $query = $request->input('query');

       $query = htmlspecialchars(strip_tags($query));

       $users = User::where(function($q) use ($query) {
           $q->where('first_name', 'like', "%$query%")
             ->orWhere('middle_name', 'like', "%$query%")
             ->orWhere('last_name', 'like', "%$query%");
       }) ->orderBy('created_at', 'desc')->paginate(5);

          // Set the profile_image_path attribute for each user
      $users->each(function ($user) {
        $user->profile_image_path = $user->image
            ? asset('user/' . $user->image)
            : asset('user/default.jpg');
    });
        return view('admin.users.index', compact('users','departments'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('admin.users.create',compact("departments"));
}


public function store(Request $request)
{
        $validated = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'birth_date' => 'required',
            'password' => 'required|min:8|confirmed', // Add the 'confirmed' rule
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:user,office', // Make sure you include 'role' in the form.
            'department_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('user', $imageName);

            // Add the image filename or path to the validated data
            $validated['image'] = $imageName;
        }

        // Hash the password
        $validated['password'] = Hash::make($validated['password']);

    // Save the user using the validated data
    $user = User::create($validated);


    
    // Assign the role based on the 'role' field
    if ($validated['role'] === 'office') {
        $user->assignRole('office'); // Use the correct role name defined in your system.
    } else {
        $user->assignRole('user');
    }

    return redirect()->route('admin.users.index')->with('message', 'User created.');
}

 public function edit(Request $request, User $user)
{
    $users = User::all(); // Fetch all users
    $permissions = Permission::all();
    $departments = Department::all();
    $clickedUserId = $user->id;

    $users->each(function ($item) use ($clickedUserId) {
        if ($item->id == $clickedUserId) {
            $item->profile_image_path = $item->image
                ? asset('user/' . $item->image)
                : asset('user/default.jpg');
        }
    });
     return view('admin.users.edit', compact("users","clickedUserId", "permissions",'departments'));
}


public function update(Request $request, User $user)
{
    $permissions = Permission::all();
    $validated = $request->validate([
        'first_name' => 'string|max:255',
        'middle_name' => 'string|max:255',
        'last_name' => 'string|max:255',
        'email' => 'string|email|unique:users,email,' . $user->id,
        'birth_date' => 'date|nullable',
        'phone' => 'string|max:20|nullable',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
         'department_id' => 'required'
    ]);

    $user->update($validated);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move("user", $imageName);



        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->image = $imageName;
        $user->save();
    }

    $users = User::all();
     $user->refresh(); // Retrieve the updated user record
    return view('admin.users.index', compact('users',"permissions"));
}


public function permission(User $user,Request $request)
{
    $roles = Role::all();
    $permissions = Permission::all();

    $users = User::all(); // Fetch all users

    $clickedUserId = $user->id;

    $users->each(function ($item) use ($clickedUserId) {
        if ($item->id == $clickedUserId) {
            $item->profile_image_path = $item->image
                ? asset('user/' . $item->image)
                : asset('user/default.jpg');
        }
    });

    return view('admin.users.permission', compact('users', 'roles', 'permissions', "clickedUserId"));
}


public function show(User $user, Request $request)
{
    $roles = Role::all();
    $users = User::all(); // Fetch all users

    $clickedUserId = $user->id;

    $users->each(function ($item) use ($clickedUserId) {
        if ($item->id == $clickedUserId) {
            $item->profile_image_path = $item->image
                ? asset('user/' . $item->image)
                : asset('user/default.jpg');
        }
    });

    return view('admin.users.role', compact('users',"roles",'clickedUserId'));
}


public function assignRole(Request $request, User $user)
{
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
}

public function removeRole(User $user, Role $role)
{
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
}

public function givePermission(Request $request, User $user)
{
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
}

public function revokePermission(User $user, Permission $permission)
{
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
}

public function destroy(User $user)
{
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
}

public function search(Request $request)
{
    $query = $request->input('query');
    $users = User::where('name', 'like', "%$query%")->paginate(10);

    return view('users.index', compact('users'));
}
}






