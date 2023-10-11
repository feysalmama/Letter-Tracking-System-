<?php

namespace App\Http\Controllers\Letter;

use App\Models\Route;
use App\Models\LetterType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::all();
        return view('letter.predefined_routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letterTypes = LetterType::all(); // Fetch all letter types
        return view('letter.predefined_routes.create', compact('letterTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string',
            'estimated_waiting_time' => 'required|integer',
            'office_name' => 'required|string',
            'in_or_out_office' => 'boolean|nullable',
            'zone' => 'string|nullable',
            'woreda' => 'string|nullable',
            'letter_type_id' => 'required|exists:letter_types,id',
        ]);

        // Create a new route using the validated data
        Route::create($validated);

        // Redirect to a view or route, e.g., back to the index view
        return redirect()->route('letter.predefined-routes.index')->with('success', 'Route created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $predefined_route)
    {
        $letterTypes = LetterType::all();
        return view('letter.predefined_routes.edit', compact('predefined_route','letterTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $predefined_route)
    {
           // Validate the incoming request data
           $validated = $request->validate([
            'name' => 'required|string',
            'estimated_waiting_time' => 'required|integer',
            'office_name' => 'required|string',
            'in_or_out_office' => 'boolean|nullable',
            'zone' => 'string|nullable',
            'woreda' => 'string|nullable',
            'letter_type_id' => 'required|exists:letter_types,id',
        ]);

        // Create a new route using the validated data
        $predefined_route->update($validated);

        // Redirect to a view or route, e.g., back to the index view
        return redirect()->route('letter.predefined-routes.index')->with('success', 'Route updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $predefined_route)
    {
        //   if ($predefined_route->nodes) {
        //     return redirect()->route('letter.predefined-routes.index')
        //         ->with('error', 'Cannot delete route with an associated nodes.');
        // }
    
        // Additional checks for other relationships, if applicable
    
        $predefined_route->delete();
    
        return redirect()->route('letter.predefined-routes.index')
            ->with('success', 'Route deleted successfully.');
 
    }
}
