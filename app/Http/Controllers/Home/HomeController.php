<?php

namespace App\Http\Controllers\Home;

use App\Models\Letter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
public function check(){

    return view('/home.check');
}
public function status(Request $request){


$secretCode = $request->input('secret_code');
$letter =Letter::Where('unique_code', $secretCode)->first();
$status = null;
if($letter){
    $status = $letter->status;
}

    return view('/home.status', compact('status'));
}
}
