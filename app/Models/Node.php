<?php

namespace App\Models;

use App\Models\User;
use App\Models\Route;
use App\Models\LetterMovement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Node extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',           // Name of the node or office
        'office_name',    // Office name
        'in_or_out_office', // 1 for "In" and 0 for "Out"
        'zone',           // Zone or city administration
        'estimated_waiting_time',           // Estimated_waiting_time of letter
        'woreda',         // Woreda (if applicable)
        'user_id'
    ];



    public function routes()
    {
        return $this->belongsToMany(Route::class)
            ->withPivot('order'); // Include the order field from the pivot table
    }

    public function movements()
    {
        return $this->hasMany(LetterMovement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




    // Function to calculate the next available order for a new node in a route
    function calculateNextNodeOrder($route)
    {
        if ($route) {
            $highestOrder = $route->nodes()->max('order');
            if ($highestOrder === null) {
                return 1; // No existing orders, set a default value
            }
            return $highestOrder + 1;
        }
        return 1; // Default to 1 if the route is not found
    }


}
