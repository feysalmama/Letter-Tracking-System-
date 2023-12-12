<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{

    public function index()
    { $departments = Department::all();
       return view("admin.departments.index", compact("departments"));
    }
  public function create()
    {
        return view('admin.departments.create');
    }

     public function edit(Department $department)
    {
         $departments = Department::all();
          $clickedDepartmentId = $department->id;

          return view('admin.departments.edit',compact("departments","clickedDepartmentId"));

    }

public function update(Department $department, Request $request)
{
    $validated = $request->validate([
          'name' => 'required',
            "description"=>"required"
    ]);
    $department->update($validated);

    $departments = Department::all();
    $department->refresh();

    return view('admin.departments.index', compact('departments'))->with('success', 'departments created.');
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            "description"=>"required"
        ]);

        Department::create($validated);

        return to_route('admin.departments.index')->with('success', 'departments updated.');
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'departments updated.');

    }

}
