<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function welcome()
    {
        $data = SensorData::latest()->first();
        return view('welcome', compact('data'));
    }
} 