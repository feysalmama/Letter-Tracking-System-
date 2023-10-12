<?php

namespace App\Models;

use App\Models\LetterType;
use App\Models\LetterMovement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getDestinationNode()
    {
        $initialNode = $this->getInitialNode();

        if ($initialNode) {
            $predefinedRoute = $this->letterType->routes->first();

            // Determine the next node in the route based on the order.
            $destinationNode = $predefinedRoute->nodes()
                ->where('order', '>', $initialNode->pivot->order)
                ->orderBy('order')
                ->first();

            return $destinationNode;
        }

        return null; // Handle the case where no predefined route is associated with the letter type.
    }

    public function followsNode(Node $destinationNode, Node $initialNode)
    {
        // Check if either $destinationNode or $initialNode is null
        if ($destinationNode === null || $initialNode === null) {
            return false; // You may return false or handle this case according to your business logic.
        }
    
        // Retrieve the order of the destination and initial nodes within the predefined route.
        $destinationOrder = $destinationNode->pivot->order;
        $initialOrder = $initialNode->pivot->order;
    
        // Ensure that the destination node follows the initial node in the route.
        return $destinationOrder > $initialOrder;
    }
    


}
