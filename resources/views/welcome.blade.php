<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profan - Lemari Pengering Cerdas</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background: #fff;
        }
        .navbar {
            background: #4636db;
            color: #fff;
            padding: 18px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 0 0 28px 28px;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 1.4rem;
            font-weight: bold;
        }
        .navbar .logo span {
            margin-left: 10px;
        }
        .navbar .nav-links {
            display: flex;
            gap: 32px;
        }
        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
        }
        .hero {
            position: relative;
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 0 0 28px 28px;
        }
        .hero-img {
            width: 100%;
            height: 340px;
            object-fit: cover;
            display: block;
        }
        .hero-title {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4636db;
            color: #fff;
            font-size: 2.4rem;
            font-weight: bold;
            padding: 12px 36px;
            border-radius: 6px;
            font-style: italic;
            text-align: center;
        }
        .features-section {
            padding: 40px 20px;
            text-align: center;
            background-color: #f9f9f9;
        }
        .features-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 40px;
        }
        .features-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1100px;
            margin: 0 auto;
        }
        .feature-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 30px;
            width: 300px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-card img {
            width: 64px;
            height: 64px;
            margin-bottom: 20px;
        }
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #4636db;
        }
        .feature-card p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
        }
        .desc {
            text-align: center;
            margin: 36px auto 0 auto;
            max-width: 900px;
            font-size: 1.1rem;
            color: #222;
        }
        .learn-btn {
            display: block;
            margin: 32px auto 0 auto;
            background: #4636db;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px 38px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .learn-btn:hover {
            background: #3727b1;
        }
        .stats-section {
            background: #e3f0ff;
            padding: 36px 0 48px 0;
            margin: 0 auto;
            max-width: 1100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 0 0 28px 28px;
        }
        .stats-title {
            background: #4636db;
            color: #fff;
            font-size: 2rem;
            padding: 18px 0;
            border-radius: 22px 22px 0 0;
            width: 100%;
            text-align: center;
            margin-bottom: 32px;
        }
        .stats-cards {
            display: flex;
            gap: 38px;
            justify-content: center;
        }
        .stat-card {
            background: #fff;
            box-shadow: 2px 4px 8px #b6c6e0;
            border-radius: 8px;
            width: 240px;
            padding: 32px 0 24px 0;
            text-align: center;
        }
        .stat-card img {
            width: 54px;
            height: 54px;
            margin-bottom: 10px;
        }
        .stat-card .label {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 12px;
        }
        .stat-card .value {
            font-size: 2.3rem;
            margin-top: 18px;
        }
        @media (max-width: 900px) {
            .stats-cards {
                flex-direction: column;
                gap: 24px;
            }
            .hero-title {
                font-size: 1.3rem;
                padding: 8px 12px;
            }
        }
        /* Style for data-box (from previous code, might not be needed but kept for completeness) */
        .data-box { border: 2px solid #4CAF50; padding: 20px; width: 300px; margin: auto; border-radius: 10px; }
        h2 { color: #333; text-align: center; }
        p { font-size: 18px; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <span style="font-size:2rem;">&#129527;</span>
            <span>The Third Interprenuer</span>
        </div>
        <div class="nav-links">
            <a href="/login">Login</a>
            <a href="/about">About</a>
        </div>
    </div>
    <div class="hero">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80" alt="jemuran" class="hero-img">
        <div class="hero-title"><b><i>Lemari Pengering Pakaian Cerdas</i></b></div>
    </div>
    <div class="features-section">
        <h2 class="features-title">Fitur Unggulan</h2>
        <div class="features-container">
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/2900/2900228.png" alt="Sensor Cerdas">
                <h3>Sensor Cerdas</h3>
                <p>Sistem sensor terintegrasi memantau suhu dan kelembapan untuk hasil pengeringan yang sempurna dan efisien.</p>
            </div>
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/9408/9408996.png" alt="Kontrol Jarak Jauh">
                <h3>Kontrol Jarak Jauh</h3>
                <p>Kendalikan dan pantau lemari pengering Anda dari mana saja menggunakan aplikasi smartphone yang mudah digunakan.</p>
            </div>
            <div class="feature-card">
                <img src="https://cdn-icons-png.flaticon.com/512/2143/2143176.png" alt="Hemat Energi">
                <h3>Hemat Energi</h3>
                <p>Didesain untuk efisiensi, mengurangi konsumsi energi dan menghemat biaya listrik Anda.</p>
            </div>
        </div>
    </div>
    <div class="desc">
        Selamat datang di masa depan mencuci! Project Profan kami adalah sistem lemari pengering pakaian cerdas berbasis IoT yang dirancang untuk merevolusi cara Anda mengeringkan pakaian. Lupakan kekhawatiran tentang cuaca yang tidak dapat diprediksi atau pakaian yang lembab. Dengan teknologi sensor canggih, sistem kami secara cerdas memantau suhu dan kelembaban untuk memastikan kondisi pengeringan yang optimal, sementara Anda dapat memantau semuanya dari kenyamanan rumah Anda.
    </div>
    <script>
        // Update local clock every second for real-time display
        function updateRealtimeClock() {
            const now = new Date();
            let h = now.getHours().toString().padStart(2, '0');
            let m = now.getMinutes().toString().padStart(2, '0');
            let s = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('time-value').textContent = `${h}:${m}:${s}`;
        }

        // Run the function immediately and then every second
        updateRealtimeClock();
        setInterval(updateRealtimeClock, 1000);

        // Mengambil data sensor dari API setiap 1 detik
        async function fetchData(){
            try {
                // Fetch data dari API Laravel yang baru kita buat
                const response = await fetch('/api/sensors');
                const data = await response.json();

                if (data.suhu !== null && data.humidity !== null) {
                    document.getElementById('suhu-value').textContent = data.suhu + "° C";
                    document.getElementById('humidity-value').textContent = data.humidity + "%";
                    // 'time-value' is now updated by updateRealtimeClock()
                } else {
                    document.getElementById('suhu-value').textContent = '-';
                    document.getElementById('humidity-value').textContent = '-';
                    // 'time-value' is now updated by updateRealtimeClock()
                }

            } catch (error) {
                console.error("Error fetching sensor data:", error);
                document.getElementById('suhu-value').textContent = 'Error';
                document.getElementById('humidity-value').textContent = 'Error';
                document.getElementById('time-value').textContent = 'Error'; // Show error for time too if API fails
            }
        }

        // Jalankan fetchData setiap 1 detik
        setInterval(fetchData, 1000);
        // Panggil fetchData segera setelah halaman dimuat untuk menampilkan data awal
        fetchData();

    </script>
</body>
</html>