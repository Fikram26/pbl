<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work - The Third Interprenuer</title>
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

        /* Work Cards */
        .work-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .work-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .work-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .work-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .work-count {
            background: #e0e7ff;
            color: #4f46e5;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .work-list {
            list-style: none;
        }

        .work-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .work-item:last-child {
            border-bottom: none;
        }

        .work-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .work-icon {
            width: 40px;
            height: 40px;
            background: #f3f4f6;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
        }

        .work-details h4 {
            font-size: 1rem;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .work-details p {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .work-status {
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

        .work-timer {
            font-family: monospace;
            font-size: 1.25rem;
            color: #4f46e5;
            font-weight: 600;
        }

        .work-actions {
            display: flex;
            gap: 0.5rem;
        }

        .work-btn {
            padding: 0.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .launch-btn {
            background: #4f46e5;
            color: white;
        }

        .launch-btn:hover {
            background: #4338ca;
        }

        .complete-btn {
            background: #10b981;
            color: white;
        }

        .complete-btn:hover {
            background: #059669;
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
            <a href="{{ route('user.dashboard') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('user.orders') }}" class="nav-item">
                <i class="fas fa-tshirt"></i>
                <span>Orders</span>
            </a>
            <a href="{{ route('user.work') }}" class="nav-item">
                <i class="fas fa-briefcase"></i>
                <span>Work</span>
            </a>
        </div>

        <div class="nav-menu">
            <p class="menu-title">Support</p>
            <a href="{{ route('user.settings') }}" class="nav-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1 class="page-title">
                <i class="fas fa-briefcase"></i>
                Work Management
            </h1>
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" style="background:none;border:none;color:#fff;font-size:1rem;cursor:pointer;">Logout</button>
            </form>
        </div>

        <!-- Work Cards -->
        <div class="work-cards">
            <!-- Active Orders -->
            <div class="work-card">
                <div class="work-header">
                    <h2 class="work-title">Active Orders</h2>
                    <span class="work-count">{{ $activeOrders ?? 0 }}</span>
                </div>
                <ul class="work-list">
                    @forelse($activeOrders ?? [] as $order)
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-icon">
                                <i class="fas fa-tshirt"></i>
                            </div>
                            <div class="work-details">
                                <h4>Order #{{ $order->id }}</h4>
                                <p>{{ $order->service_type }}</p>
                            </div>
                        </div>
                        <div class="work-timer" data-started-at="{{ $order->started_at }}" data-duration="{{ $order->duration }}">
                            {{ $order->remaining_time }}
                        </div>
                    </li>
                    @empty
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-details">
                                <p>No active orders</p>
                            </div>
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>

            <!-- Pending Orders -->
            <div class="work-card">
                <div class="work-header">
                    <h2 class="work-title">Pending Orders</h2>
                    <span class="work-count">{{ $pendingOrders ?? 0 }}</span>
                </div>
                <ul class="work-list">
                    @forelse($pendingOrders ?? [] as $order)
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="work-details">
                                <h4>Order #{{ $order->id }}</h4>
                                <p>{{ $order->service_type }}</p>
                            </div>
                        </div>
                        <div class="work-actions">
                            <form action="{{ route('user.orders.launch', $order->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="work-btn launch-btn">
                                    <i class="fas fa-play"></i>
                                    Launch
                                </button>
                            </form>
                        </div>
                    </li>
                    @empty
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-details">
                                <p>No pending orders</p>
                            </div>
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>

            <!-- Completed Orders -->
            <div class="work-card">
                <div class="work-header">
                    <h2 class="work-title">Completed Orders</h2>
                    <span class="work-count">{{ $completedOrders ?? 0 }}</span>
                </div>
                <ul class="work-list">
                    @forelse($completedOrders ?? [] as $order)
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="work-details">
                                <h4>Order #{{ $order->id }}</h4>
                                <p>{{ $order->service_type }}</p>
                            </div>
                        </div>
                        <span class="work-status status-completed">Completed</span>
                    </li>
                    @empty
                    <li class="work-item">
                        <div class="work-info">
                            <div class="work-details">
                                <p>No completed orders</p>
                            </div>
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <script>
        function updateOrderTimers() {
            document.querySelectorAll('.work-timer').forEach(timerElement => {
                const startedAtTimestamp = parseInt(timerElement.dataset.startedAt);
                const duration = parseInt(timerElement.dataset.duration);

                let remainingSeconds;
                if (startedAtTimestamp > 0) {
                    // Order sudah di-launch, hitung mundur
                    const nowTimestamp = Math.floor(Date.now() / 1000);
                    const elapsedSeconds = nowTimestamp - startedAtTimestamp;
                    remainingSeconds = duration - elapsedSeconds;
                } else {
                    // Order belum di-launch, tampilkan durasi penuh
                    remainingSeconds = duration;
                }

                if (remainingSeconds <= 0) {
                    timerElement.textContent = '00:00:00';
                } else {
                    const hours = Math.floor(remainingSeconds / 3600);
                    const minutes = Math.floor((remainingSeconds % 3600) / 60);
                    const seconds = remainingSeconds % 60;

                    const formattedTime =
                        String(hours).padStart(2, '0') + ':' +
                        String(minutes).padStart(2, '0') + ':' +
                        String(seconds).padStart(2, '0');

                    timerElement.textContent = formattedTime;
                }
            });
        }

        // Update timers every second
        setInterval(updateOrderTimers, 1000);
        updateOrderTimers();
    </script>
</body>
</html> 