<?php

namespace App\Models;

use App\Models\Node;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',                  // e.g., "Route A"
        'estimated_waiting_time', // in minutes
        'office_name',           // Name of the office or point of interaction
        'in_or_out_office',       // 1 for "In" and 0 for "Out"
        'zone',                  // Zone or city administration
        'woreda',                // Woreda (if applicable)
        'letter_type_id',        // Foreign key to link with LetterType
    ];


    public function nodes()
    {
        return $this->belongsToMany(Node::class)
            ->withPivot('order') // Include the order field from the pivot table
            ->orderBy('order');  // Order nodes by their position in the route
    }

  public function letterType()
    {
        return $this->belongsTo(LetterType::class, 'letter_type_id');
    }
}
