<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - The Third Interprenuer</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background: #f0f7ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            text-decoration: none;
            color: #fff;
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
        .main-container {
            flex: 1;
            padding: 40px 20px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .about-card {
            background: #fff;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 10px 25px rgba(70, 54, 219, 0.1);
        }
        h1 {
            color: #4636db;
            font-size: 2.4rem;
            margin-bottom: 32px;
            text-align: center;
        }
        .about-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            max-width: 800px;
            margin: 0 auto;
        }
        .team-section {
            margin-top: 48px;
        }
        .team-section h2 {
            color: #4636db;
            font-size: 1.8rem;
            margin-bottom: 24px;
            text-align: center;
        }
        .features {
            margin-top: 32px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }
        .feature {
            background: #f8faff;
            padding: 24px;
            border-radius: 16px;
            text-align: center;
        }
        .feature img {
            width: 64px;
            height: 64px;
            margin-bottom: 16px;
        }
        .feature h3 {
            color: #4636db;
            margin-bottom: 12px;
        }
        .feature p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="/" class="logo">
            <span style="font-size:2rem;">&#129527;</span>
            <span>The Third Interprenuer</span>
        </a>
        <div class="nav-links">
            <a href="/login">Login</a>
            <a href="/about">About</a>
        </div>
    </nav>

    <div class="main-container">
        <div class="about-card">
            <h1>About Us</h1>
            <div class="about-content">
                <p>
                    The Third Interprenuer menghadirkan solusi inovatif untuk pengeringan pakaian dalam ruangan menggunakan teknologi IoT dan sensor canggih. 
                    Kami berkomitmen untuk memberikan pengalaman mengeringkan pakaian yang lebih efisien, higienis, dan ramah lingkungan.
                </p>
                <div class="features">
                    <div class="feature">
                        <img src="https://cdn-icons-png.flaticon.com/512/1684/1684375.png" alt="Temperature">
                        <h3>Monitoring Suhu</h3>
                        <p>Pantau suhu secara real-time untuk memastikan kondisi pengeringan optimal</p>
                    </div>
                    <div class="feature">
                        <img src="https://cdn-icons-png.flaticon.com/512/728/728093.png" alt="Humidity">
                        <h3>Kontrol Kelembaban</h3>
                        <p>Kelembaban terkontrol untuk hasil pengeringan yang sempurna</p>
                    </div>
                    <div class="feature">
                        <img src="https://cdn-icons-png.flaticon.com/512/61/61112.png" alt="Smart">
                        <h3>Smart System</h3>
                        <p>Sistem pintar yang dapat dikontrol dari mana saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 