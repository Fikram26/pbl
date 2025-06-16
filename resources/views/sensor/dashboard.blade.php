<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: #1f2937;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            text-align: center;
        }

        .card-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .temperature .card-icon {
            color: #ef4444;
        }

        .humidity .card-icon {
            color: #3b82f6;
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .card-label {
            color: #6b7280;
            font-size: 1.1rem;
        }

        .last-updated {
            text-align: center;
            color: #6b7280;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sensor Dashboard</h1>
            <p>Monitoring Suhu dan Kelembaban</p>
        </div>

        <div class="cards-grid">
            <div class="card temperature">
                <div class="card-icon">
                    <i class="fas fa-temperature-high"></i>
                </div>
                <div class="card-value">{{ $latestData ? $latestData->suhu : '0' }}°C</div>
                <div class="card-label">Suhu</div>
            </div>

            <div class="card humidity">
                <div class="card-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="card-value">{{ $latestData ? $latestData->humidity : '0' }}%</div>
                <div class="card-label">Kelembaban</div>
            </div>
        </div>

        @if($latestData)
        <div class="last-updated">
            Terakhir diperbarui: {{ $latestData->created_at->format('d M Y H:i:s') }}
        </div>
        @endif
    </div>

    <script>
        // Auto refresh every 30 seconds
        setTimeout(function() {
            window.location.reload();
        }, 30000);
    </script>
</body>
</html> 