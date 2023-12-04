<?php

namespace App\Http\Controllers\Home;
use App\Models\Node;
use App\Models\Letter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
public function check(){

    return view('/home.check');
}
public function status(Request $request){

// get the secret code entered by the user
$secretCode = $request->input('secret_code');

// validate the availablity of the unique code and get them
// $letter =Letter::Where('unique_code', $secretCode)->first();
$letter = Letter::where('unique_code', $secretCode)->first();



if($letter){

    $status = $letter->status;
    // get current node for this letter contain this unique code
   $currentNode = $letter->getCurrentNode();

   $countNode = $letter->countNodesInRoute();

   $route = $letter->letterType->routes->first();

   $routeId = $route->pluck('id')->first();



   $nodes = Node::whereHas('routes', function ($query) use ($routeId) {
    $query->where('route_id', $routeId);
})->get();
// dd($nodes);





}

    return view('/home.status', compact('status','letter','currentNode','countNode','nodes'));
}
}
