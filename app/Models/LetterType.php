<?php

namespace App\Models;

use App\Models\Route;
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

}
