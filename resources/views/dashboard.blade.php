<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Sensor IoT</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 100px; 
        }
        .data-box { 
            border: 2px solid #4CAF50; 
            padding: 20px; 
            width: 300px; 
            margin: auto; 
            border-radius: 10px; 
        }
        h2 { 
            color: #333; 
        }
        p { 
            font-size: 18px; 
        }
    </style>
</head>
<body>
    <h1>📊 Data Sensor IoT</h1>

    @if ($data)
        <div class="data-box">
            <p><strong>Suhu:</strong> {{ $data->suhu }} °C</p>
            <p><strong>Kelembaban:</strong> {{ $data->humidity }} %</p>
            <p><strong>Waktu:</strong> {{ $data->created_at }}</p>
        </div>
    @else
        <p>⏳ Tidak ada data tersedia.</p>
    @endif

    <script>
        // Auto refresh every 30 seconds
        setTimeout(function() {
            window.location.reload();
        }, 30000);
    </script>
</body>
</html> 