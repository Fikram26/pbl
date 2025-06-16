<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index()
    {
        $latestData = SensorData::latest()->first();
        return view('sensor.dashboard', compact('latestData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'suhu' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        SensorData::create($request->all());
        return response()->json(['message' => 'Data berhasil disimpan']);
    }
} 