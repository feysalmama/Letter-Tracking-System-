<?php

namespace App\Models;

use App\Models\Route;
use App\Models\Letter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LetterType extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
      
    ];

    public function routes()
{
    return $this->hasMany(Route::class);
}

public function letters()
{
    return $this->hasMany(Letter::class, 'letter_type_id');
}

}
