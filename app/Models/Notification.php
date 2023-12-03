<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification  extends Model
{
    use HasFactory;

    // protected $table = 'notifications';


     protected $fillable = [
        'id',
        'user_id',
        'type',
        'updated_at',
        'created_at',

 ];

//     public function user()
// {
//     return $this->belongsTo(User::class,'user_id','id');
// }
}
