<?php

namespace App\Http\Controllers;

use App\Models\SensorData; // Pastikan ini mengacu pada Model SensorData Anda
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon untuk format waktu

class SensorDataController extends Controller
{
    /**
     * Mengambil data sensor terbaru dari database.
     * Digunakan oleh API endpoint untuk fetching data secara periodik.
     */
    public function getLatestData()
    {
        // Ambil data sensor terbaru
        $latestData = SensorData::latest()->first();

        if ($latestData) {
            return response()->json([
                'suhu' => number_format($latestData->suhu, 2),
                'humidity' => number_format($latestData->humidity, 2),
                // Menggunakan Carbon untuk memformat waktu ke H:i:s
                'created_at' => Carbon::parse($latestData->created_at)->format('H:i:s')
            ]);
        } else {
            // Jika tidak ada data, kembalikan nilai null atau pesan kosong
            return response()->json([
                'suhu' => null,
                'humidity' => null,
                'created_at' => null // Atau 'Tidak ada data'
            ]);
        }
    }

    /**
     * Menyimpan data sensor baru ke database.
     * Ini adalah endpoint yang akan menerima data dari perangkat IoT Anda.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'suhu' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        $sensorData = SensorData::create($validated);

        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $sensorData
        ], 201);
    }
}