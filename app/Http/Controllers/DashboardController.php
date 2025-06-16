<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $data = SensorData::latest()->first();
        return view('dashboard', compact('data'));
    }

    public function welcome()
    {
        $data = \App\Models\SensorData::latest()->first();
        return view('welcome', compact('data'));
    }
} 