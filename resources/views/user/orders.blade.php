<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - {{ $user->name }}</title>
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

        /* Orders Table */
        .orders-container {
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

        .create-button {
            background-color: #4f46e5;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .create-button:hover {
            background-color: #4338ca;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th {
            text-align: left;
            padding: 1rem;
            background-color: #f9fafb;
            color: #374151;
            font-weight: 500;
        }

        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
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

        .timer-display {
            font-size: 0.875rem;
            font-weight: 500;
            color: #1e40af;
            margin-top: 0.25rem;
        }

        .status-completed {
            background: #dcfce7;
            color: #166534;
        }

        .status-lunas {
            background: #dcfce7;
            color: #166534;
        }

        .status-belum_lunas {
            background: #fef3c7;
            color: #92400e;
        }

        .order-timer {
            font-family: monospace;
            font-size: 0.9rem;
            color: #4f46e5;
            font-weight: 600;
            background-color: #f3f4f6;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .order-timer.warning {
            color: #f59e0b;
            background-color: #fef3c7;
            animation: pulse 1s infinite;
        }

        .order-timer.danger {
            color: #ef4444;
            background-color: #fee2e2;
            animation: pulse 0.5s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .edit-button, .delete-button {
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .edit-button {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .delete-button {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .edit-button:hover {
            background-color: #bfdbfe;
        }

        .delete-button:hover {
            background-color: #fecaca;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .orders-table {
                display: block;
                overflow-x: auto;
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
                <i class="fas fa-tshirt"></i>
                Orders
            </h1>
        </div>

        <div class="orders-container">
            <div class="orders-header">
                <h2 class="orders-title">All Orders</h2>
                <a href="{{ route('user.orders.create') }}" class="create-button">
                    <i class="fas fa-plus"></i>
                    Create New Order
                </a>
            </div>

            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Jenis Pakaian</th>
                        <th>Bahan</th>
                        <th>Banyak</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->jenis_pakaian }}</td>
                        <td>{{ $order->bahan_pakaian }}</td>
                        <td>{{ $order->banyak }}</td>
                        <td>
                            <span class="status-badge {{ 'status-' . strtolower(str_replace(' ', '_', $order->status)) }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>
                            <span class="status-badge status-{{ strtolower($order->payment_status) }}">
                                {{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">No orders found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function updateOrderTimers() {
            document.querySelectorAll('.order-timer').forEach(timerElement => {
                const startedAtTimestamp = parseInt(timerElement.dataset.startedAt);
                const duration = parseInt(timerElement.dataset.duration);

                if (startedAtTimestamp > 0) {
                    const nowTimestamp = Math.floor(Date.now() / 1000);
                    const elapsedSeconds = nowTimestamp - startedAtTimestamp;
                    const remainingSeconds = duration - elapsedSeconds;

                    if (remainingSeconds <= 0) {
                        timerElement.textContent = '00:00:00';
                        timerElement.classList.add('danger');
                        
                        // Update status order ke selesai
                        const orderId = timerElement.closest('tr').querySelector('td:first-child').textContent.replace('#', '');
                        fetch(`/admin/orders/${orderId}/complete`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        }).then(() => {
                            // Reload halaman setelah status diupdate
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        });
                    } else {
                        // Add warning class when less than 1 minute remaining
                        if (remainingSeconds <= 60) {
                            timerElement.classList.add('warning');
                        } else {
                            timerElement.classList.remove('warning');
                        }

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
                }
            });
        }

        // Update timers immediately and then every second
        updateOrderTimers();
        setInterval(updateOrderTimers, 1000);
    </script>
</body>
</html> 