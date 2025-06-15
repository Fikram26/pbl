<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - The Third Interprenuer</title>
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

        /* Table Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding: 1.5rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            text-align: left;
            padding: 1rem;
            background-color: #f8fafc;
            color: #1f2937;
            font-weight: 600;
        }

        .table td {
            padding: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .table tr:hover {
            background-color: #f8fafc;
        }

        .btn {
            padding: 0.5rem 1rem;
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

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Styles from original orders.blade.php */
        .table th {
            background-color: #f8f9fa;
        }
        .badge {
            font-size: 0.85em;
            padding: 0.5em 0.75em;
        }
        .btn-group {
            gap: 0.5rem;
        }
        .btn {
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        .btn i {
            font-size: 0.9em;
        }
        .btn-warning {
            color: #000;
        }
        .btn-warning:hover {
            color: #000;
        }

        /* Add styles for the timer */
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

        .bg-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .bg-info {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .bg-success {
            background-color: #dcfce7;
            color: #166534;
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
                <i class="fas fa-tshirt"></i>
                Orders Management
            </h1>
        </div>

        {{-- Orders Table Content --}}
        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h2 style="font-size: 1.25rem; color: #1f2937;">List of Orders</h2>
                <form action="{{ route('admin.orders') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search orders..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                </form>
                <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add New Order
                </a>
            </div>

            @if(session('success'))
            <div style="background-color: #dcfce7; color: #166534; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Account</th>
                        <th>Jenis Pakaian</th>
                        <th>Bahan Pakaian</th>
                        <th>Jumlah</th>
                        <th>Timer</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Tanggal Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->account->email ?? 'N/A' }}</td> {{-- Display account email --}}
                        <td>{{ $order->jenis_pakaian }}</td>
                        <td>{{ $order->bahan_pakaian }}</td>
                        <td>{{ $order->banyak }}</td>
                        <td>
                            @if($order->status === 'sedang dikerjakan' && $order->started_at)
                                <div class="order-timer" data-started-at="{{ $order->started_at->timestamp }}" data-duration="{{ $order->timer_duration * 60 }}">
                                    --:--:--
                                </div>
                            @else
                                {{ $order->timer_duration }} menit
                            @endif
                        </td>
                        <td>
                            <span class="status-badge status-{{ strtolower($order->status) }}">
                                {{ $order->status }}
                            </span>
                            @if(strtolower($order->status) === 'sedang dikerjakan')
                                <div class="timer-display" id="timer-{{ $order->id }}" data-start-time="{{ $order->updated_at->timestamp }}">
                                    Calculating...
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $order->payment_status === 'belum_lunas' ? 'warning' : 'success' }}">
                                {{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                @if($order->status === 'belum selesai')
                                <form action="{{ route('admin.orders.launch', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-play"></i>
                                        Launch
                                    </button>
                                </form>
                                @endif
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus order ini?')">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 2rem;">
                            <div style="margin-bottom: 1rem;">
                                <i class="fas fa-tshirt" style="font-size: 3rem; color: #9ca3af;"></i>
                            </div>
                            <p style="color: #6b7280; margin-bottom: 1rem;">No orders found yet.</p>
                            <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Create Your First Order
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <script>
        // Update order timers
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
                        
                        // Show completion notification only once
                        if (!timerElement.dataset.notified) {
                            timerElement.dataset.notified = 'true';
                            const orderId = timerElement.closest('tr').querySelector('td:first-child').textContent;
                            const jenisPakaian = timerElement.closest('tr').querySelector('td:nth-child(3)').textContent;
                            
                            // Create notification
                            const notification = document.createElement('div');
                            notification.style.cssText = `
                                position: fixed;
                                top: 20px;
                                right: 20px;
                                background-color: #10b981;
                                color: white;
                                padding: 1rem;
                                border-radius: 0.5rem;
                                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
                                z-index: 1000;
                                animation: slideIn 0.5s ease-out;
                            `;
                            notification.innerHTML = `
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-check-circle"></i>
                                    <div>
                                        <div style="font-weight: 600;">Order Selesai!</div>
                                        <div style="font-size: 0.875rem;">Order #${orderId} - ${jenisPakaian}</div>
                                    </div>
                                </div>
                            `;
                            document.body.appendChild(notification);

                            // Remove notification after 5 seconds
                            setTimeout(() => {
                                notification.style.animation = 'slideOut 0.5s ease-in';
                                setTimeout(() => notification.remove(), 500);
                            }, 5000);

                            // Update status order ke selesai
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
                        }
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
                } else {
                    timerElement.textContent = '--:--:--';
                }
            });
        }

        // Add notification styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        // Update timers immediately and then every second
        updateOrderTimers();
        setInterval(updateOrderTimers, 1000);
    </script>
</body>
</html> 