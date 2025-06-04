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

        /* Settings Content */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .settings-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .settings-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .settings-icon {
            width: 40px;
            height: 40px;
            background: #e0e7ff;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
            font-size: 1.25rem;
        }

        .settings-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: #1f2937;
        }

        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-button {
            background: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-button:hover {
            background: #4338ca;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Login History Table */
        .login-history {
            margin-top: 1.5rem;
        }

        .login-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .login-history th,
        .login-history td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .login-history th {
            font-weight: 500;
            color: #6b7280;
            background: #f9fafb;
        }

        .login-history tr:last-child td {
            border-bottom: none;
        }

        /* Identity Info */
        .identity-info {
            margin-top: 1.5rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .info-value {
            color: #1f2937;
            font-weight: 500;
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
            <span>{{ $user->name }}</span>
        </div>
        
        <div class="nav-menu">
            <p class="menu-title">Menu</p>
            <a href="{{ route('user.dashboard') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('user.orders') }}" class="nav-item">
                <i class="fas fa-tshirt"></i>
                <span>Orders</span>
            </a>
            <a href="{{ route('user.settings') }}" class="nav-item">
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
                <i class="fas fa-cog"></i>
                Settings
            </h1>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <div class="settings-grid">
            <!-- Profile Settings -->
            <div class="settings-card">
                <div class="settings-header">
                    <div class="settings-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h2 class="settings-title">Profile Settings</h2>
                </div>

                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-input" value="{{ auth()->user()->name ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" value="{{ auth()->user()->email ?? '' }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-input" value="{{ auth()->user()->phone ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-input" rows="3">{{ auth()->user()->address ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="form-button">
                        <i class="fas fa-save"></i>
                        Save Changes
                    </button>
                </form>
            </div>

            <!-- Password Settings -->
            <div class="settings-card">
                <div class="settings-header">
                    <div class="settings-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2 class="settings-title">Password Settings</h2>
                </div>

                <form action="{{ route('user.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-input" required>
                    </div>

                    <button type="submit" class="form-button">
                        <i class="fas fa-key"></i>
                        Update Password
                    </button>
                </form>
            </div>

            <!-- Login History -->
            <div class="settings-card">
                <div class="settings-header">
                    <div class="settings-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h2 class="settings-title">Login History</h2>
                </div>

                <div class="login-history">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($loginHistory ?? [] as $login)
                            <tr>
                                <td>{{ $login->created_at->format('M d, Y') }}</td>
                                <td>{{ $login->created_at->format('H:i:s') }}</td>
                                <td>{{ $login->ip_address ?? 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center;">No login history available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Identity Information -->
            <div class="settings-card">
                <div class="settings-header">
                    <div class="settings-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h2 class="settings-title">Identity Information</h2>
                </div>

                <div class="identity-info">
                    <div class="info-item">
                        <span class="info-label">Account ID</span>
                        <span class="info-value">{{ auth()->user() ? auth()->user()->id : 'N/A' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Member Since</span>
                        <span class="info-value">{{ auth()->user() && auth()->user()->created_at ? auth()->user()->created_at->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Last Login</span>
                        <span class="info-value">{{ auth()->user() && auth()->user()->last_login_at ? auth()->user()->last_login_at->format('M d, Y H:i:s') : 'N/A' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Account Status</span>
                        <span class="info-value">{{ auth()->user() && auth()->user()->is_active ? 'Active' : 'Inactive' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 