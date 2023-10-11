<?php

namespace App\Http\Controllers\Letter;

use App\Models\Node;
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
        return view('letter.nodes.create', compact('routes'));
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
            'office_name' => 'required|string',
            'in_or_out_office' => 'boolean|nullable',
            'zone' => 'string|nullable',
            'woreda' => 'string|nullable',
            'route_id' => 'required|exists:routes,id',
        ]);

        // Create a new route using the validated data
        Node::create($validated);

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
              // Validate the incoming request data
              $validated = $request->validate([
                'name' => 'required|string',
                'office_name' => 'required|string',
                'in_or_out_office' => 'boolean|nullable',
                'zone' => 'required|string',
                'woreda' => 'required|string',
                'route_id' => 'required|exists:routes,id',
            ]);
    
            // Create a new route using the validated data
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
