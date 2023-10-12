<?php

namespace App\Http\Controllers\Letter;

use App\Models\Node;
use App\Models\Letter;
use Illuminate\Http\Request;
use App\Models\LetterMovement;
use App\Http\Controllers\Controller;

class LetterMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letterMovements = LetterMovement::all();
        return view('letter.letter_movement.index', compact('letterMovements'));
  
    }

    public function createMovement(Letter $letter)
    {
        // Get the destination node using the special function in the Letter model
        $destinationNode = $letter->getDestinationNode();
       

        if (!$destinationNode) {
            return redirect()->route('letter.letter-movements.index')->with('error', 'Invalid Destination Node');
        }

        return view('letter.letter_movement.createMovement', compact('letter', 'destinationNode'));
    }


    public function recordMovement(Request $request,Letter $letter, Node $destinationNode)
    {
        // Validate the inputs,
        // Validate the input data
        $status = $request->validate([
            'status' => 'required',
        ]);
        // Calculate the initial node using the helper method
        $initialNode = $letter->getInitialNode();

        if (!$initialNode) {
            return redirect()->route('letters.show', $letter)->with('error', 'Invalid Letter Route');
        }

        // Ensure that the destination node follows the initial node
        if (!$letter->followsNode($destinationNode, $initialNode)) {
            return redirect()->route('letters.show', $letter)->with('error', 'Invalid Destination Node');
        }

        // Create a new movement record.
        $movement = new LetterMovement([
            'movement_date' => now(),
            'status' => $status,
        ]);

        // Use the relationships to associate the letter and destination node
        $movement->letter()->associate($letter);
        $movement->node()->associate($destinationNode);

        $movement->save();

        // Optionally, you can send notifications or update other relevant data.

        // return redirect()->route('letter.letter-movements.show', $letter)->with('success', 'Movement recorded successfully.');
        return redirect()->route('letter.letter-movements.index')->with('success', 'Movement recorded successfully.');

    }















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LetterMovement  $letterMovement
     * @return \Illuminate\Http\Response
     */
    public function show(LetterMovement $letterMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LetterMovement  $letterMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(LetterMovement $letterMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LetterMovement  $letterMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LetterMovement $letterMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LetterMovement  $letterMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(LetterMovement $letterMovement)
    {
        //
    }
}
