<?php

namespace App\Models;

use App\Models\LetterType;
use App\Models\LetterMovement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Route;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_type_id',
        'unique_code',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'letter_title',
        'status',
        'file_path',
    ];

    public function letterType()
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id');
    }

    public function movements()
    {
        return $this->hasMany(LetterMovement::class);
    }


    public function route()
    {
        // Define the relationship with the predefined route
        return $this->belongsTo(Route::class, 'route_id');
    }



 // Function to get the initial node for the letter
 public function getInitialNode()
 {
     $letterType = $this->letterType;

     if ($letterType) {
         $predefinedRoute = $letterType->routes->first();

         if ($predefinedRoute) {
             // Get the first node in the predefined route
             $initialNode = $predefinedRoute->nodes()->orderBy('order')->first();

             if ($initialNode) {
                 return $initialNode;
             }
         }
     }

     return null;
 }


    public function getCurrentNode()
    {
        // Get the most recent movement for the letter
        $mostRecentMovement = $this->movements()->latest('created_at')->first();

        // return $mostRecentMovement;

        if ($mostRecentMovement) {
            // Retrieve the node ID associated with the most recent movement
            $currentNodeId = $mostRecentMovement->node_id;

            // Load the node with the pivot data for 'order'
            $currentNode = Node::with(['routes' => function ($query) use ($currentNodeId) {
                $query->where('node_route.node_id', $currentNodeId); // Assuming the pivot table is named 'node_route'
            }])
            ->where('id', $currentNodeId)
            ->first();

            if ($currentNode) {
                // Extract the pivot data for 'order'
                $currentNode->pivot = $currentNode->routes->first()->pivot;

                return $currentNode;
            }
        }

        // Handle the case where no movements exist for the letter (e.g., the letter is at the initial node).
        return null;
    }


        public function getDestinationNode()
    {
        // Get the current node using the getCurrentNode method
        $currentNode = $this->getCurrentNode();

        if (!$currentNode) {
            return null; // Handle the case where the current node is not found.
        }

        // Retrieve the predefined route associated with the letter type
        $predefinedRoute = $this->letterType->routes->first();

        if (!$predefinedRoute) {
            return null; // Handle the case where no predefined route is associated with the letter type.
        }

        // Find the next node in the predefined route based on the order
        $destinationNode = $predefinedRoute->nodes()
            ->where('order', '>', $currentNode->pivot->order)
            ->orderBy('order')
            ->first();

        if (!$destinationNode) {
            return $currentNode; // Handle the case where the current node is the last node.
        }

        return $destinationNode;
    }


    public function followsNode(Node $destinationNode, Node $currentNode)
    {
        // Check if either $destinationNode or $currentNode is null
        if ($destinationNode === null || $currentNode === null) {
            return false; // You may return false or handle this case according to your business logic.
        }

        // Check if the pivot relationship exists for both nodes
        if (!$destinationNode->pivot || !$currentNode->pivot) {
            return false; // Handle this case as needed.
        }

        // Retrieve the order of the destination and current nodes within the predefined route.
        $destinationOrder = $destinationNode->pivot->order;
        $currentOrder = $currentNode->pivot->order;

        // Ensure that the destination node follows the current node in the route.
        return $destinationOrder > $currentOrder;
    }
}
