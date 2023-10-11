<?php

namespace App\Models;

use App\Models\Route;
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
        'woreda',         // Woreda (if applicable)
        'route_id',       // Foreign key to link with Route
    ];

    public function route()
{
    return $this->belongsTo(Route::class);
}

}
