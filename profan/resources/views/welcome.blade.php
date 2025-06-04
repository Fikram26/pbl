<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jemuran Indor berbasis IOT dan Sensor</title>
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
        <div class="hero-title"><b><i>Jemuran Indor berbasis IOT dan sensor</i></b></div>
    </div>
    <div class="stats-section">
        <div class="stats-title">Jemuran indor berbasis IOT dan sensor</div>
        <div class="stats-cards">
            <div class="stat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/1684/1684375.png" alt="Suhu">
                <div class="label">Suhu</div>
                <div class="value">27,90&deg; C</div>
            </div>
            <div class="stat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/728/728093.png" alt="Kelembaban">
                <div class="label">Kelembaban</div>
                <div class="value">55,30%</div>
            </div>
            <div class="stat-card">
                <img src="https://cdn-icons-png.flaticon.com/512/61/61112.png" alt="Waktu">
                <div class="label">Waktu</div>
                <div class="value" id="clock">12:30:45</div>
            </div>
        </div>
    </div>
    <div class="desc">
        Di era digital ini, kebutuhan akan kemudahan dan efisiensi menjadi prioritas.<br>
        Jemuran indoor berbasis IoT hadir sebagai solusi modern untuk Anda yang ingin mengeringkan pakaian dengan praktis, higienis, dan hemat energi.
    </div>
    <script>
        // Jam realtime
        function updateClock() {
            const now = new Date();
            let h = now.getHours().toString().padStart(2, '0');
            let m = now.getMinutes().toString().padStart(2, '0');
            let s = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = `${h}:${m}:${s}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
