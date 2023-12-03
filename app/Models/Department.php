<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];


     // Define relationships if needed
    public function users()
    {
        return $this->hasMany(User::class,'department_id','id');
    }
}
