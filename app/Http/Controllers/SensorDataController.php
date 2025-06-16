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

    public function getLatestData()
    {
        $data = SensorData::latest()->first();

        return response()->json([
            'suhu'     => $data ? number_format($data->suhu, 2) : null,
            'humidity' => $data ? number_format($data->humidity, 2) : null,
            'created_at' => $data ? $data->created_at->format('H:i:s') : null,
        ]);
    }
} 