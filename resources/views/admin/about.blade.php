<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - The Third Interprenuer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            background-color: #f3f4f6;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            height: 100vh;
            background-color: white;
            padding: 2rem;
            position: fixed;
            left: 0;
            top: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .nav-menu {
            margin-top: 4rem;
        }

        .menu-title {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1rem;
            color: #374151;
            text-decoration: none;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-item:hover {
            background-color: #f3f4f6;
        }

        .nav-item i {
            width: 20px;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            width: calc(100% - 280px);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4f46e5;
            padding: 1rem 2rem;
            color: white;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        /* About Content Styles */
        .about-section {
            margin-bottom: 2rem;
        }

        .about-section h3 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .about-section p {
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            color: #4b5563;
        }

        .feature-list i {
            color: #4f46e5;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 0.5rem;
        }

        .contact-item i {
            font-size: 1.25rem;
            color: #4f46e5;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-hanger"></i>
            <span>The Third Interprenuer</span>
        </div>
        
        <div class="nav-menu">
            <p class="menu-title">Menu</p>
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.orders') }}" class="nav-item">
                <i class="fas fa-tshirt"></i>
                <span>Orders</span>
            </a>
            <a href="{{ route('admin.user') }}" class="nav-item">
                <i class="fas fa-user"></i>
                <span>User</span>
            </a>
            <a href="{{ route('admin.timer') }}" class="nav-item">
                <i class="fas fa-clock"></i>
                <span>Timer</span>
            </a>
            <a href="{{ route('admin.about') }}" class="nav-item">
                <i class="fas fa-info-circle"></i>
                <span>About</span>
            </a>
            <a href="{{ route('admin.settings') }}" class="nav-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 2rem;">
                @csrf
                <button type="submit" class="nav-item" style="width: 100%; border: none; background: none; cursor: pointer; text-align: left;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1 class="page-title">
                <i class="fas fa-info-circle"></i>
                About Us
            </h1>
        </div>

        <!-- About Content -->
        <div class="card">
            <div class="about-section">
                <h3><i class="fas fa-building me-2"></i>Our Company</h3>
                <p>
                    The Third Interprenuer adalah perusahaan laundry terpercaya yang telah melayani pelanggan sejak tahun 2020. 
                    Kami berkomitmen untuk memberikan layanan laundry berkualitas tinggi dengan harga yang terjangkau.
                </p>
            </div>

            <div class="about-section">
                <h3><i class="fas fa-star me-2"></i>Our Services</h3>
                <ul class="feature-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Layanan Cuci & Setrika
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Dry Cleaning
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Layanan Express
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Pick-up & Delivery
                    </li>
                </ul>
            </div>

            <div class="about-section">
                <h3><i class="fas fa-bullseye me-2"></i>Our Mission</h3>
                <p>
                    Menjadi penyedia layanan laundry terpercaya yang mengutamakan kualitas, 
                    kecepatan, dan kepuasan pelanggan dalam setiap layanan yang kami berikan.
                </p>
            </div>

            <div class="about-section">
                <h3><i class="fas fa-phone me-2"></i>Contact Information</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Alamat</strong>
                            <p>Jl. Contoh No. 123, Kota</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Telepon</strong>
                            <p>+62 123 4567 890</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <p>info@thirdinterprenuer.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 