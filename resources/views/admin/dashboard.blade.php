<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - The Third Interprenuer</title>
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

        .logo img {
            width: 32px;
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

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .card-icon {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .card-value {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .temperature .card-icon {
            color: #ef4444;
        }

        .humidity .card-icon {
            color: #3b82f6;
        }

        .time .card-icon {
            color: #374151;
        }

        .card-label {
            color: #6b7280;
        }

        /* Images Grid */
        .images-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .image-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .image-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        @media (max-width: 1024px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .cards-grid {
                grid-template-columns: 1fr;
            }
            .images-grid {
                grid-template-columns: 1fr;
            }
        }

        .users .card-icon {
            color: #4f46e5;
        }

        .orders .card-icon {
            color: #10b981;
        }

        .card-header {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1f2937;
        }

        .card-body {
            padding: 1rem;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .data-table th {
            font-weight: 500;
            color: #6b7280;
            background: #f9fafb;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .image-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .revenue .card-icon {
            color: #f59e0b;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .stats-header {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .stats-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1f2937;
        }

        .stats-body {
            padding: 1rem;
        }

        .stats-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .stats-item:last-child {
            border-bottom: none;
        }

        .stats-label {
            color: #6b7280;
        }

        .stats-value {
            font-weight: 600;
            color: #1f2937;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-all {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-processing {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: 1fr;
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
            <h1 class="page-title">Dashboard</h1>
        </div>

        <div class="cards-grid">
            <div class="card users">
                <i class="fas fa-users card-icon"></i>
                <div class="card-value">{{ \App\Models\User::count() }}</div>
                <div class="card-label">Total Users</div>
            </div>
            <div class="card orders">
                <i class="fas fa-tshirt card-icon"></i>
                <div class="card-value">{{ \App\Models\Order::count() }}</div>
                <div class="card-label">Total Orders</div>
            </div>
            <div class="card revenue">
                <i class="fas fa-money-bill-wave card-icon"></i>
                <div class="card-value">{{ \App\Models\Order::where('status', 'completed')->count() }}</div>
                <div class="card-label">Completed Orders</div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-header">
                    <h3>Order Statistics</h3>
                </div>
                <div class="stats-body">
                    <div class="stats-item">
                        <span class="stats-label">Pending Orders</span>
                        <span class="stats-value">{{ \App\Models\Order::where('status', 'pending')->count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">Processing Orders</span>
                        <span class="stats-value">{{ \App\Models\Order::where('status', 'processing')->count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">Completed Orders</span>
                        <span class="stats-value">{{ \App\Models\Order::where('status', 'selesai')->count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">Cancelled Orders</span>
                        <span class="stats-value">{{ \App\Models\Order::where('status', 'cancelled')->count() }}</span>
                    </div>
                </div>
            </div>

            <div class="stats-card">
                <div class="stats-header">
                    <h3>User Statistics</h3>
                </div>
                <div class="stats-body">
                    <div class="stats-item">
                        <span class="stats-label">Total Users</span>
                        <span class="stats-value">{{ \App\Models\Login::count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">New Users Today</span>
                        <span class="stats-value">{{ \App\Models\Login::whereDate('created_at', today())->count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">Total Admins</span>
                        <span class="stats-value">{{ \App\Models\Login::where('role', 'admin')->count() }}</span>
                    </div>
                    <div class="stats-item">
                        <span class="stats-label">Total Customers</span>
                        <span class="stats-value">{{ \App\Models\Login::where('role', 'user')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="images-grid">
            <div class="image-card">
                <div class="card-header">
                    <h3>Recent Orders</h3>
                    <a href="{{ route('admin.orders') }}" class="view-all">View All</a>
                </div>
                <div class="card-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Order::with('account')->latest()->take(5)->get() as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->account->name }}</td>
                                <td>{{ $order->banyak }} items</td>
                                <td>{{ $order->jenis_pakaian }}</td>
                                <td>
                                    <span class="status-badge status-{{ $order->status }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="image-card">
                <div class="card-header">
                    <h3>Recent Customers</h3>
                    <a href="{{ route('admin.user') }}" class="view-all">View All</a>
                </div>
                <div class="card-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Login::where('role', 'user')->latest()->take(5)->get() as $user)
                            <tr>
                                <td>#{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>