<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - The Third Interprenuer</title>
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #4f46e5;
            color: white;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .badge-primary {
            background-color: #4f46e5;
            color: white;
        }

        .badge-success {
            background-color: #22c55e;
            color: white;
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
    @php
        $user = \App\Models\Login::find(session('login_id'));
    @endphp

    @if($user && $user->isAdmin())
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
            <a href="{{ route('admin.settings') }}" class="nav-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a href="{{ route('admin.timer') }}" class="nav-item">
                <i class="fas fa-clock"></i>
                <span>Timer</span>
            </a>
            <a href="{{ route('admin.about') }}" class="nav-item">
                <i class="fas fa-info-circle"></i>
                <span>About</span>
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
                <i class="fas fa-cog"></i>
                Settings
            </h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Admin Information -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Informasi Admin</h2>
            </div>
            <div class="card-body">
                <p>ID Admin: {{ $user->id }}</p>
                <p>Nama: {{ $user->name }}</p>
                <p>Role: <span class="badge badge-primary">{{ ucfirst($user->role) }}</span></p>
                <p>Status: <span class="badge badge-success">Aktif</span></p>
                @if($user->last_login_at)
                    <p>Terakhir Login: {{ $user->last_login_at->format('d M Y H:i') }}</p>
                @endif
                <p>Bergabung: {{ $user->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <!-- Email Settings -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-envelope me-2"></i>
                    Pengaturan Email
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="email" class="form-label">Email Admin</label>
                        <input type="email" class="form-input @error('email') is-invalid @enderror" 
                            id="email" name="email" value="{{ $user->email }}" required>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Email ini akan digunakan untuk notifikasi sistem</small>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Email
                    </button>
                </form>
            </div>
        </div>

        <!-- Password Settings -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-key me-2"></i>
                    Pengaturan Password
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-input @error('current_password') is-invalid @enderror" 
                            id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-input @error('password') is-invalid @enderror" 
                            id="password" name="password" required>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-input" 
                            id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key"></i>
                        Update Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Security Tips -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-shield-alt me-2"></i>
                    Tips Keamanan
                </h5>
            </div>
            <div class="card-body">
                <ul class="feature-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Gunakan password yang kuat dan unik
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Jangan bagikan kredensial login Anda
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Selalu logout setelah selesai menggunakan sistem
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        Aktifkan autentikasi dua faktor jika tersedia
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>
            Unauthorized access. Please login as an administrator.
        </div>
    @endif
</body>
</html> 