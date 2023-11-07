<?php

namespace App\Http\Controllers\Letter;

use App\Models\Node;
use App\Models\User;
use App\Models\Letter;
use Illuminate\Http\Request;
use App\Models\LetterMovement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LetterComingNotification;
use App\Notifications\LetterProgressingNotification;

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

    public function recordMovement(Request $request, Letter $letter)
    {
        $letterMovements = LetterMovement::all();
        //  Validate the input data
        $status = $request->validate([
            'status' => 'required|in:In Progress,Completed,Pending,Rejected',
        ]);

        // Calculate the destination node using the helper method
        $destinationNode = $letter->getDestinationNode();


        // Determine the current node (you may need to implement a way to determine this, such as tracking the current handler in your application).


         // Update the status of the current node.
        $currentNode = $letter->getCurrentNode(); // Implement a method to get the current node.

        $latestMovement = $letter->movements()->latest('created_at')->first();


        // Check if the current node is the last node in the predefined route.
        if ($currentNode->id === $destinationNode->id) {
            // If the current node is the last node, update its status and return without creating a new movement record.
            $latestMovement->update(['status' => $status['status']]);

            return redirect()->route('letter.letter-movements.index', $letter)->with('success', 'Letter is now at the last node with status updated.');
        }


        // updating the latest movement record when creating the next one
        $latestMovement->update(['status' => $status['status']]); // Update the status based on your business logic.




        // Ensure that the destination node follows the current node.
        if (!$letter->followsNode($destinationNode, $currentNode)) {
            return redirect()->route('letter.letter-movements.index', $letter)->with('error', 'Invalid Destination Node');
        }

        // Create a new movement record with "In Progress" status.
        $movement = new LetterMovement([
            'movement_date' => now(),
            'status' => 'In Progress', // Use the validated status from the request
        ]);

        // Use the relationships to associate the letter and destination node.
           $movement->letter()->associate($letter);
           $movement->node()->associate($destinationNode);

           $movement->save();

         // Send the notification to the user email associated with the destination node
           $userEmail = $destinationNode->user->email;
           $user = User::where('email', $userEmail)->first();
          Notification::send($user, new LetterComingNotification($letter ));


         $customerEmail = $letterMovements->pluck('letter.customer_email')->first();

        if ($customerEmail) {
          Notification::route('mail', $customerEmail)->notify(new LetterProgressingNotification($letter, $currentNode, $destinationNode));
        }


        return redirect()->route('letter.letter-movements.index')->with('success', 'Movement recorded successfully.');
    }




















//     public function recordMovement(Request $request, Letter $letter)
// {
//     // Find the latest movement for the letter
//     // $latestMovement = $letter->movements->latest()->first();
//     $latestMovement = $letter->movements->sortByDesc('movement_date')->first();


//     if ($latestMovement) {
//         // Eager load the routes relationship with pivot data
//         $destinationNode = Node::with(['routes' => function ($query) {
//             $query->withPivot('order');
//         }])->find($latestMovement->node->id);

//         // Here, you should be able to access pivot data using $destinationNode->routes

//         // Calculate the current node (the one currently holding the letter)
//         $currentNode = $latestMovement->node;

//         // Update the status of the current node based on your business logic.
//         $currentNode->update(['status' => 'Completed']); // Update the status based on your business logic.

//         // Validate the input data
//         $status = $request->validate([
//             'status' => 'required|in:In Progress,Completed,Pending,Rejected',
//         ]);

//         // Ensure that the destination node follows the current node based on their orders.
//         if (!$letter->followsNode($currentNode, $destinationNode)) {
//             return redirect()->route('letter.letter-movements.index', $letter)->with('error', 'Invalid Destination Node');
//         }

//         // Create a new movement record with the validated status from the request
//         $movement = new LetterMovement([
//             'movement_date' => now(),
//             'status' => $status['status'],
//         ]);

//         // Use the relationships to associate the letter and destination node
//         $movement->letter()->associate($letter);
//         $movement->node()->associate($destinationNode);

//         $movement->save();

//         // Optionally, you can send notifications or update other relevant data.

//         return redirect()->route('letter.letter-movements.index')->with('success', 'Movement recorded successfully.');
//     } else {
//         return redirect()->route('letters.show', $letter)->with('error', 'No previous movement found.');
//     }
// }




    // public function recordMovement(Request $request, Letter $letter)
    // {
    //     // Calculate the destination node using the helper method
    //     $destinationNode = $letter->getDestinationNode();
    //     // return $destinationNode;


    //     // Calculate the current node (the one currently holding the letter)
    //     $currentNode = $letter->getCurrentNode(); // Implement a method to get the current node.
    //     return $currentNode;

    //     if (!$currentNode) {
    //         return redirect()->route('letters.show', $letter)->with('error', 'Invalid Letter Route');
    //     }

    //     // Update the status of the current node based on your business logic.
    //     $currentNode->update(['status' => 'Completed']); // Update the status based on your business logic.

    //     // Ensure that the destination node follows the current node based on their orders.
    //     if (!$letter->followsNode($currentNode, $destinationNode)) {
    //         return redirect()->route('letter.letter-movements.index', $letter)->with('error', 'Invalid Destination Node');
    //     }

    //     // Create a new movement record with "In Progress" status
    //     $movement = new LetterMovement([
    //         'movement_date' => now(),
    //         'status' => 'In Progress',
    //     ]);

    //     // Use the relationships to associate the letter and destination node
    //     $movement->letter()->associate($letter);
    //     $movement->node()->associate($destinationNode);

    //     $movement->save();

    //     // Optionally, you can send notifications or update other relevant data.

    //     return redirect()->route('letter.letter-movements.index')->with('success', 'Movement recorded successfully.');
    // }



    // public function recordMovement(Request $request, Letter $letter)
    // {
    //     // Calculate the destination node using the helper method
    //     $destinationNode = $letter->getDestinationNode();

    //     // Validate the input data
    //     $status = $request->validate([
    //         'status' => 'required|in:In Progress,Completed,Pending,Rejected',
    //     ]);

    //     // Calculate the initial node using the helper method
    //     $initialNode = $letter->getInitialNode();


    //     if (!$initialNode) {
    //         return redirect()->route('letters.show', $letter)->with('error', 'Invalid Letter Route');
    //     }



    //     // Ensure that the destination node follows the initial node
    //     if (!$letter->followsNode($destinationNode, $initialNode)) {
    //         return redirect()->route('letter.letter-movements.index', $letter)->with('error', 'Invalid Destination Node');
    //     }


    //     // Create a new movement record.
    //     $movement = new LetterMovement([
    //         'movement_date' => now(),
    //         'status' => 'In Progress', // Use the validated status from the request
    //     ]);

    //     // Use the relationships to associate the letter and destination node
    //     $movement->letter()->associate($letter);
    //     $movement->node()->associate($destinationNode);

    //     $movement->save();

    //     // Optionally, you can send notifications or update other relevant data.

    //     return redirect()->route('letter.letter-movements.index')->with('success', 'Movement recorded successfully.');
    // }


















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
