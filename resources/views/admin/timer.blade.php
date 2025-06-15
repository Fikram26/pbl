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

        .timer-display {
            font-size: 0.875rem;
            font-weight: 500;
            color: #1e40af;
            margin-top: 0.25rem;
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

        .table th, .table td {
            padding: 1rem 1.5rem;
            text-align: left;
        }
        .table tr {
            border-bottom: 1px solid #e5e7eb;
        }
        .table tbody tr:not(:last-child) {
            margin-bottom: 0.5rem;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 0.5rem;
            background: white;
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
                <i class="fas fa-clock"></i>
                Timer Management
            </h1>
        </div>

        <!-- Timer Orders Table -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Timer Orderan</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Jenis Pakaian</th>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Timer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activeOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->jenis_pakaian }}</td>
                            <td>{{ $order->bahan_pakaian }}</td>
                            <td>{{ $order->banyak }}</td>
                            <td>
                                <div class="order-timer" data-started-at="{{ $order->started_at ? $order->started_at->timestamp : 0 }}" data-duration="{{ $order->timer_duration * 60 }}">
                                    --:--:--
                                </div>
                            </td>
                            <td>
                                <span class="status-badge status-progress">{{ $order->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">Tidak ada order yang sedang dikerjakan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function updateOrderTimers() {
            document.querySelectorAll('.order-timer').forEach(timerElement => {
                const startedAtTimestamp = parseInt(timerElement.dataset.startedAt);
                const duration = parseInt(timerElement.dataset.duration);
                const row = timerElement.closest('tr');
                const statusCell = row.querySelector('td:last-child .status-badge');
                if (startedAtTimestamp > 0) {
                    const nowTimestamp = Math.floor(Date.now() / 1000);
                    const elapsedSeconds = nowTimestamp - startedAtTimestamp;
                    const remainingSeconds = duration - elapsedSeconds;
                    if (remainingSeconds <= 0) {
                        timerElement.textContent = '00:00:00';
                        timerElement.classList.add('danger');
                        // Update status di database hanya sekali
                        if (!timerElement.dataset.completed) {
                            timerElement.dataset.completed = 'true';
                            const orderId = row.querySelector('td').textContent.trim();
                            fetch(`/admin/orders/${orderId}/complete`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Content-Type': 'application/json'
                                }
                            }).then(() => {
                                // Update status di tabel tanpa reload
                                if (statusCell) {
                                    statusCell.textContent = 'selesai';
                                    statusCell.classList.remove('status-progress');
                                    statusCell.classList.add('status-completed');
                                }
                            });
                        }
                    } else {
                        const hours = Math.floor(remainingSeconds / 3600);
                        const minutes = Math.floor((remainingSeconds % 3600) / 60);
                        const seconds = remainingSeconds % 60;
                        let formattedTime;
                        if (hours > 0) {
                            formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                        } else {
                            formattedTime = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                        }
                        timerElement.textContent = formattedTime;
                    }
                } else {
                    timerElement.textContent = '--:--:--';
                }
            });
        }
        setInterval(updateOrderTimers, 1000);
        updateOrderTimers();
    </script>
</body>
</html> 