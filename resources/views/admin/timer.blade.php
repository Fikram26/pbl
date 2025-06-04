<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timer Management - The Third Interprenuer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* Timer Styles */
        .timer {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4f46e5;
            text-align: center;
            margin: 1rem 0;
            padding: 0.5rem;
            background-color: #f3f4f6;
            border-radius: 0.5rem;
            font-family: monospace;
        }

        /* Status Badge Styles */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-progress {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-completed {
            background-color: #dcfce7;
            color: #166534;
        }

        /* Button Styles */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            transition: background-color 0.2s;
        }

        .btn-primary {
            background-color: #4f46e5;
            color: white;
        }

        .btn-success {
            background-color: #10b981;
            color: white;
        }

        .btn-success:hover {
            background-color: #059669;
        }

        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }

        .btn-warning:hover {
            background-color: #d97706;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Timer Item Styles */
        .timer-item {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .timer-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .timer-item-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .timer-item-details {
            margin-bottom: 1rem;
            color: #4b5563;
        }

        .timer-item-details > div {
            margin-bottom: 0.5rem;
        }

        .timer-item-actions {
            display: flex;
            gap: 1rem;
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
                <i class="fas fa-clock"></i>
                Timer Management
            </h1>
        </div>

        <!-- Active Orders Section -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Active Orders</h2>
            </div>
            @forelse($activeOrders as $order)
            <div class="timer-item">
                <div class="timer-item-header">
                    <h3 class="timer-item-title">Order #{{ $order->id }}</h3>
                    <span class="status-badge status-progress">In Progress</span>
                </div>
                <div class="timer-item-details">
                    <div>Customer: {{ $order->account->name }}</div>
                    <div>Jenis Pakaian: {{ $order->jenis_pakaian }}</div>
                    <div>Bahan: {{ $order->bahan_pakaian }}</div>
                    <div>Banyak: {{ $order->banyak }}</div>
                    <div>Started: {{ $order->started_at->format('M d, Y H:i') }}</div>
                    <div class="timer" id="timer-{{ $order->id }}" data-duration="{{ $order->timer_duration }}" data-start="{{ $order->started_at->timestamp }}">
                        Loading...
                    </div>
                </div>
                <div class="timer-item-actions">
                    <form action="{{ route('admin.orders.complete-timer', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i>
                            Complete
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <p>No active orders at the moment.</p>
            @endforelse
        </div>

        <!-- Pending Orders Section -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Pending Orders</h2>
            </div>
            @forelse($pendingOrders as $order)
            <div class="timer-item">
                <div class="timer-item-header">
                    <h3 class="timer-item-title">Order #{{ $order->id }}</h3>
                    <span class="status-badge status-pending">Pending</span>
                </div>
                <div class="timer-item-details">
                    <div>Customer: {{ $order->account->name }}</div>
                    <div>Jenis Pakaian: {{ $order->jenis_pakaian }}</div>
                    <div>Bahan: {{ $order->bahan_pakaian }}</div>
                    <div>Banyak: {{ $order->banyak }}</div>
                </div>
                <div class="timer-item-actions">
                    <form action="{{ route('admin.orders.launch', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-play"></i>
                            Start
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <p>No pending orders at the moment.</p>
            @endforelse
        </div>

        <!-- Completed Orders Section -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Completed Orders</h2>
            </div>
            @forelse($completedOrders as $order)
            <div class="timer-item">
                <div class="timer-item-header">
                    <h3 class="timer-item-title">Order #{{ $order->id }}</h3>
                    <span class="status-badge status-completed">Completed</span>
                </div>
                <div class="timer-item-details">
                    <div>Customer: {{ $order->account->name }}</div>
                    <div>Jenis Pakaian: {{ $order->jenis_pakaian }}</div>
                    <div>Bahan: {{ $order->bahan_pakaian }}</div>
                    <div>Banyak: {{ $order->banyak }}</div>
                    <div>Completed: {{ $order->updated_at->format('M d, Y H:i') }}</div>
                </div>
            </div>
            @empty
            <p>No completed orders at the moment.</p>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Timer functionality for active orders
            @foreach($activeOrders as $order)
            (function() {
                const timerElement = document.getElementById('timer-{{ $order->id }}');
                const duration = {{ $order->timer_duration }} * 60; // Convert to seconds
                const startTime = new Date('{{ $order->started_at }}').getTime();
                
                function updateTimer() {
                    const now = new Date().getTime();
                    const elapsed = Math.floor((now - startTime) / 1000);
                    const remaining = Math.max(0, duration - elapsed);
                    
                    const minutes = Math.floor(remaining / 60);
                    const seconds = remaining % 60;
                    
                    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    
                    if (remaining > 0) {
                        setTimeout(updateTimer, 1000);
                    } else {
                        timerElement.textContent = "00:00";
                        timerElement.style.color = "#ef4444";
                        // Optional: Auto-complete the order when timer reaches zero
                        // document.querySelector(`form[action*="complete-timer/{{ $order->id }}"]`).submit();
                    }
                }
                
                // Start the timer immediately
                updateTimer();
            })();
            @endforeach
        });
    </script>
</body>
</html> 