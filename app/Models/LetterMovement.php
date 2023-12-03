<?php

namespace App\Models;

use App\Models\Node;
use App\Models\Letter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LetterMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_id',
        'node_id',
        'movement_date',
        'status',
        'reason',
    ];

    public function letter()
    {
        return $this->belongsTo(Letter::class, 'letter_id');
    }

    public function node()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }
}
