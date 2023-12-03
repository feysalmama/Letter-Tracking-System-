<?php

namespace App\Http\Controllers\Letter;

use App\Models\Node;
use App\Models\User;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nodes = Node::all();
        return view('letter.nodes.index', compact('nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::all(); // Fetch all Routes
        $users = User::all(); // Fetch all Users
        return view('letter.nodes.create', compact('users','routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
            'name' => 'required|string',
            'office_name' => 'required|string',
            'in_or_out_office' => 'boolean',
           'zone' => 'required|string',
            'estimated_waiting_time' => 'required|integer',
            'woreda' => 'string|nullable',
            'route_ids' => 'array|exists:routes,id',
            'user_id' => 'required|exists:users,id', // Ensure that a user is selected

        ]);

    // Create the node
    $node = Node::create($validated);


    // Attach the selected routes with calculated order
    foreach ($validated['route_ids'] as $routeId) {
        $order = $node->calculateNextNodeOrder(Route::find($routeId));
        $node->routes()->attach($routeId, ['order' => $order]);
    }

    // Redirect to a view or route, e.g., back to the index view
    return redirect()->route('letter.nodes.index')->with('success', 'Node created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function edit(Node $node)
    {
        $routes = Route::all();
        return view('letter.nodes.edit', compact('node','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
            $validated = $request->validate([
                'name' => 'required|string',
                'office_name' => 'required|string',
                'in_or_out_office' => 'boolean|nullable',
                'zone' => 'required|string',
                'estimated_waiting_time' => 'required|integer',
                'woreda' => 'required|string',
                'route_ids' => 'array|exists:routes,id',
            ]);

            // Check if the node has any associated routes
            if ($node->routes->isEmpty()) {
                return redirect()->route('letter.nodes.index')->with('error', 'Node update failed. The node does not have any associated routes.');
            }

            // Use sync to update the associated routes based on the selected route_ids
            $node->routes()->sync($validated['route_ids']);

             // Now, update the order of the nodes within each route
            foreach ($validated['route_ids'] as $routeId) {
                $route = Route::find($routeId); // Find the route by its ID
                if ($route) {
                    $order = $node->calculateNextNodeOrder($route); // Implement your logic to determine the order
                    $node->routes()->updateExistingPivot($routeId, ['order' => $order]);
                }
            }


            // Update all fields in the node model based on the $validated array
            $node->update($validated);

            // Redirect to a view or route, e.g., back to the index view
            return redirect()->route('letter.nodes.index')->with('success', 'Node updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        // if ($node->route) {
        //     return redirect()->route('letter.nodes.index')
        //         ->with('error', 'Cannot delete node with an associated route.');
        // }

        // Additional checks for other relationships, if applicable

        $node->delete();

        return redirect()->route('letter.nodes.index')
            ->with('success', 'Node deleted successfully.');
    }
}
