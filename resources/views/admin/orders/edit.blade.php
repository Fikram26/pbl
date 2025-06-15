<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order - The Third Interprenuer</title>
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

        /* Form Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.5rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);\n        }

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
            justify-content: center;
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

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
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
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1 class="page-title">
                <i class="fas fa-edit"></i>
                Edit Order
            </h1>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <input type="hidden" name="redirect" value="{{ route('dashboard') }}">
                <button type="submit" style="background:none;border:none;color:#fff;font-size:1rem;cursor:pointer;">Logout</button>
            </form>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="jenis_pakaian" class="form-label">Jenis Pakaian</label>
                        <input type="text" name="jenis_pakaian" id="jenis_pakaian" class="form-control" value="{{ old('jenis_pakaian', $order->jenis_pakaian) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bahan_pakaian" class="form-label">Bahan Pakaian</label>
                        <input type="text" name="bahan_pakaian" id="bahan_pakaian" class="form-control" value="{{ old('bahan_pakaian', $order->bahan_pakaian) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="banyak" class="form-label">Jumlah</label>
                        <input type="number" name="banyak" id="banyak" class="form-control" value="{{ old('banyak', $order->banyak) }}" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="timer_duration" class="form-label">Durasi Timer (menit)</label>
                        <input type="number" name="timer_duration" id="timer_duration" class="form-control" value="{{ old('timer_duration', $order->timer_duration) }}" min="1" required>
                        <small class="form-text text-muted">Waktu yang dibutuhkan untuk menyelesaikan order (dalam menit)</small>
                    </div>

                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Status Pembayaran</label>
                        <select name="payment_status" id="payment_status" class="form-control" required>
                            <option value="belum_lunas" {{ old('payment_status', $order->payment_status) == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
                            <option value="lunas" {{ old('payment_status', $order->payment_status) == 'lunas' ? 'selected' : '' }}>Lunas</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="belum selesai" {{ old('status', $order->status) == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="sedang dikerjakan" {{ old('status', $order->status) == 'sedang dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                            <option value="selesai" {{ old('status', $order->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Order</button>
                    <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 