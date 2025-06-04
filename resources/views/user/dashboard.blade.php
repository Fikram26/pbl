<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ $user->name }}</title>
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

        .card-label {
            color: #6b7280;
        }

        /* Recent Orders */
        .recent-orders {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .orders-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .order-icon {
            width: 40px;
            height: 40px;
            background: #f3f4f6;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
        }

        .order-details h4 {
            font-size: 1rem;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .order-details p {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .order-status {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
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
            <h1 class="page-title">Dashboard</h1>
        </div>

        <!-- Info Cards -->
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="card-value">{{ $totalOrders ?? 0 }}</div>
                <div class="card-label">Total Orders</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-value">{{ $pendingOrders ?? 0 }}</div>
                <div class="card-label">Pending Orders</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="card-value">{{ $completedOrders ?? 0 }}</div>
                <div class="card-label">Completed Orders</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-thermometer-half"></i>
                </div>
                <div class="card-value">--°C</div>
                <div class="card-label">Suhu</div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="card-value">--%</div>
                <div class="card-label">Kelembaban</div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="recent-orders">
            <div class="orders-header">
                <h2 class="orders-title">Recent Orders</h2>
                <a href="{{ route('user.orders') }}" class="nav-item">View All</a>
            </div>

            @forelse($recentOrders ?? [] as $order)
            <div class="order-item">
                <div class="order-info">
                    <div class="order-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="order-details">
                        <h4>Order #{{ $order->id }}</h4>
                        <p>{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                @if($order->status === 'sedang dikerjakan' && $order->started_at)
                <div class="order-timer" data-started-at="{{ $order->started_at->timestamp }}" data-duration="{{ $order->timer_duration * 60 }}">
                    --:--:--
                </div>
                @else
                <span class="order-status status-{{ strtolower($order->status) }}">
                    {{ $order->status }}
                </span>
                @endif
            </div>
            @empty
            <div class="order-item">
                <div class="order-info">
                    <div class="order-details">
                        <p>No recent orders</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Timer functionality for active orders on user dashboard
            document.querySelectorAll('.order-timer').forEach(timerElement => {
                const startedAtTimestamp = parseInt(timerElement.dataset.startedAt);
                const duration = parseInt(timerElement.dataset.duration);

                function updateTimer() {
                    const nowTimestamp = Math.floor(Date.now() / 1000);
                    const elapsedSeconds = nowTimestamp - startedAtTimestamp;
                    const remainingSeconds = duration - elapsedSeconds;

                    if (remainingSeconds <= 0) {
                        timerElement.textContent = '00:00';
                        timerElement.style.color = '#ef4444'; // Red color for expired timer
                    } else {
                        const minutes = Math.floor(remainingSeconds / 60);
                        const seconds = remainingSeconds % 60;

                        timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                        setTimeout(updateTimer, 1000);
                    }
                }

                // Start the timer if started_at is valid
                if (startedAtTimestamp > 0) {
                   updateTimer();
                } else {
                    timerElement.textContent = '--:--'; // Display default if not started
                }
            });
        });
    </script>
</body>
</html> 