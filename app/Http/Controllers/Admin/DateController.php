<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DateController extends Controller
{
  public function fetchDate(): JsonResponse
    {
        $currentDate = Carbon::now()->toDateString();

        return response()->json(['date' => $currentDate]);
    }
}
