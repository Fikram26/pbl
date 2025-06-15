<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('account');

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('jenis_pakaian', 'like', '%' . $searchTerm . '%')
                  ->orWhere('bahan_pakaian', 'like', '%' . $searchTerm . '%')
                  ->orWhere('status', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('account', function ($q2) use ($searchTerm) {
                      $q2->where('email', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        $orders = $query->get();

        return view('admin.orders', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pakaian' => 'required|string|max:255',
            'bahan_pakaian' => 'required|string|max:255',
            'banyak' => 'required|integer|min:1',
            'timer_duration' => 'required|integer|min:1',
            'payment_status' => 'required|in:belum_lunas,lunas',
        ]);

        Order::create([
            'jenis_pakaian' => $request->jenis_pakaian,
            'bahan_pakaian' => $request->bahan_pakaian,
            'banyak' => $request->banyak,
            'timer_duration' => $request->timer_duration,
            'status' => 'belum selesai',
            'account_id' => auth()->id(),
            'payment_status' => $request->payment_status,
        ]);

        return redirect()->route('admin.orders')->with('success', 'Order berhasil ditambahkan!');
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'jenis_pakaian' => 'required|string|max:255',
            'bahan_pakaian' => 'required|string|max:255',
            'banyak' => 'required|integer|min:1',
            'timer_duration' => 'required|integer|min:1',
            'status' => 'required|in:belum selesai,sedang dikerjakan,selesai',
            'payment_status' => 'required|in:belum_lunas,lunas',
        ]);
        $order->update($request->all());
        return redirect()->route('admin.orders')->with('success', 'Order berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders');
    }

    public function complete(Order $order)
    {
        $order->update(['status' => 'selesai']);
        return response()->json(['success' => true]);
    }

    public function pause(Order $order)
    {
        $order->update(['status' => 'dijeda']);
        return response()->json(['success' => true]);
    }

    public function launch(Order $order)
    {
        $order->update([
            'status' => 'sedang dikerjakan',
            'started_at' => now(),
        ]);
        return redirect()->route('admin.timer')->with('success', 'Order launched successfully!');
    }

    public function work()
    {
        $activeOrders = Order::with('account')->where('status', 'sedang dikerjakan')->get();
        $pendingCount = Order::where('status', 'belum selesai')->count();
        $inProgressCount = Order::where('status', 'sedang dikerjakan')->count();
        $completedCount = Order::where('status', 'selesai')->count();

        return view('admin.work', compact('activeOrders', 'pendingCount', 'inProgressCount', 'completedCount'));
    }

    public function completeTimer(Order $order)
    {
        $order->update(['status' => 'selesai']);
        return redirect()->route('admin.timer')->with('success', 'Order completed successfully!');
    }
}