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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .temperature .card-icon { color: #ef4444; }
        .humidity .card-icon { color: #3b82f6; }
        .time .card-icon { color: #10b981; }

        .card-label {
            font-size: 1.125rem;
            font-weight: 500;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
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
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .stats-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .stats-body {
            padding: 1rem 1.5rem;
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
        }

        .tables-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .table-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .table-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .view-all {
            color: #4f46e5;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .table-body {
            padding: 1rem;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th, .data-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            font-size: 0.875rem;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-sedang_dikerjakan {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-belum_selesai {
            background: #fef3c7;
            color: #92400e;
        }

        @media (max-width: 1024px) {
            .stats-grid, .tables-grid {
                grid-template-columns: 1fr;
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
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-wind"></i>
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
                <i class="fas fa-users"></i>
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
            <div class="user-info">
                <span>{{ $user->name ?? 'Admin' }}</span>
            </div>
        </div>

        <div class="cards-grid">
            <!-- Temperature Card -->
            <div class="card temperature">
                <div class="card-icon"><i class="fas fa-thermometer-half"></i></div>
                <div class="card-label">Suhu</div>
                <div class="card-value" id="suhu-value">
                    {{ $latestData ? number_format($latestData->suhu, 2) . '°C' : '-' }}
                </div>
            </div>

            <!-- Humidity Card -->
            <div class="card humidity">
                <div class="card-icon"><i class="fas fa-tint"></i></div>
                <div class="card-label">Kelembaban</div>
                <div class="card-value" id="humidity-value">
                    {{ $latestData ? number_format($latestData->humidity, 2) . '%' : '-' }}
                </div>
            </div>

            <!-- Time Card -->
            <div class="card time">
                <div class="card-icon"><i class="fas fa-clock"></i></div>
                <div class="card-label">Waktu</div>
                <div class="card-value" id="time-value">-</div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-header"><h3>Order Statistics</h3></div>
                <div class="stats-body">
                    <div class="stats-item"><span class="stats-label">Pending Orders</span><span class="stats-value">{{ $pendingOrders }}</span></div>
                    <div class="stats-item"><span class="stats-label">Processing Orders</span><span class="stats-value">{{ $processingOrders }}</span></div>
                    <div class="stats-item"><span class="stats-label">Completed Orders</span><span class="stats-value">{{ $completedOrdersCount }}</span></div>
                    <div class="stats-item"><span class="stats-label">Cancelled Orders</span><span class="stats-value">{{ $cancelledOrders }}</span></div>
                </div>
            </div>
            <div class="stats-card">
                <div class="stats-header"><h3>User Statistics</h3></div>
                <div class="stats-body">
                    <div class="stats-item"><span class="stats-label">Total Users</span><span class="stats-value">{{ $totalUsers }}</span></div>
                    <div class="stats-item"><span class="stats-label">New Users Today</span><span class="stats-value">{{ $newUsersToday }}</span></div>
                    <div class="stats-item"><span class="stats-label">Total Admins</span><span class="stats-value">{{ $totalAdmins }}</span></div>
                    <div class="stats-item"><span class="stats-label">Total Customers</span><span class="stats-value">{{ $totalCustomers }}</span></div>
                </div>
            </div>
        </div>

        <div class="tables-grid">
            <div class="table-card">
                <div class="table-header"><h3>Recent Orders</h3><a href="{{ route('admin.orders') }}" class="view-all">View All</a></div>
                <div class="table-body">
                    <table class="data-table">
                        <thead><tr><th>Order ID</th><th>Customer</th><th>Items</th><th>Jenis</th><th>Status</th><th>Date</th></tr></thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->account->name ?? 'N/A' }}</td>
                                <td>{{ $order->banyak }}</td>
                                <td>{{ $order->jenis_pakaian }}</td>
                                <td><span class="status-badge status-{{ str_replace(' ', '_', $order->status) }}">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table-card">
                <div class="table-header"><h3>Recent Customers</h3><a href="{{ route('admin.user') }}" class="view-all">View All</a></div>
                <div class="table-body">
                    <table class="data-table">
                        <thead><tr><th>User ID</th><th>Name</th><th>Email</th><th>Role</th><th>Joined</th></tr></thead>
                        <tbody>
                            @foreach($recentCustomers as $customer)
                            <tr>
                                <td>#{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->role }}</td>
                                <td>{{ $customer->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateRealtimeClock() {
            const now = new Date();
            const h = now.getHours().toString().padStart(2, '0');
            const m = now.getMinutes().toString().padStart(2, '0');
            const s = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('time-value').textContent = `${h}:${m}:${s}`;
        }

        async function fetchSensorData() {
            try {
                const response = await fetch('/api/sensors');
                const data = await response.json();

                if (data.suhu !== null && data.humidity !== null) {
                    document.getElementById('suhu-value').textContent = data.suhu + "°C";
                    document.getElementById('humidity-value').textContent = data.humidity + "%";
                }
            } catch (error) {
                console.error("Error fetching sensor data:", error);
            }
        }

        // Initial calls
        updateRealtimeClock();
        fetchSensorData();

        // Update every second
        setInterval(updateRealtimeClock, 1000);
        setInterval(fetchSensorData, 2000); // Fetch sensor data every 2 seconds
    </script>
</body>
</html>