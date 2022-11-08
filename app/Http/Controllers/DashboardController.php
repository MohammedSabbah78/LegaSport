<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $allSports = Sport::count();
        $sportToday = Sport::whereRaw('DATE(created_at) = CURRENT_DATE')->count();


            return response()->view('cms.dashboard',[
            'allSports' => $allSports,
            'sportToday' => $sportToday,
            ]);
    }
}
