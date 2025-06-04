<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
});

// Redirect /dashboard to /admin/dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

// Login Routes
Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot', [AuthController::class, 'showForgot'])->name('forgot');
    Route::post('/forgot', [AuthController::class, 'forgot']);
});

// Admin Routes Group
Route::prefix('admin')->name('admin.')->middleware(['web', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // About
    Route::get('/about', function () {
        return view('admin.about');
    })->name('about');

    // Settings
    Route::get('/settings', function () {
        $laundrySettings = \App\Models\LaundrySetting::all();
        return view('admin.settings', compact('laundrySettings'));
    })->name('settings');

    // User Management Routes
    Route::get('/user', function () {
        $users = \App\Models\Login::all();
        return view('admin.user', compact('users'));
    })->name('user');

    Route::get('/user/create', function () {
        return view('admin.user.create');
    })->name('user.create');

    Route::post('/user', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:logins',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'role' => 'required|in:admin,user'
        ]);

        $user = \App\Models\Login::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'role' => $validated['role']
        ]);

        return redirect()->route('admin.user')->with('success', 'User created successfully');
    })->name('user.store');

    Route::get('/user/{id}/edit', function ($id) {
        $user = \App\Models\Login::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    })->name('user.edit');

    Route::put('/user/{id}', function ($id, \Illuminate\Http\Request $request) {
        $user = \App\Models\Login::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:logins,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'role' => 'required|in:admin,user'
        ]);

        $user->update($validated);

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:8']);
            $user->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);
        }

        return redirect()->route('admin.user')->with('success', 'User updated successfully');
    })->name('user.update');

    Route::delete('/user/{id}', function ($id) {
        $user = \App\Models\Login::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully');
    })->name('user.destroy');

    // Orders Management Routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
    Route::post('/orders/{order}/pause', [OrderController::class, 'pause'])->name('orders.pause');
    Route::post('/orders/{order}/launch', [OrderController::class, 'launch'])->name('orders.launch');
    Route::post('/orders/{order}/complete-timer', [OrderController::class, 'completeTimer'])->name('orders.complete-timer');

    // Work Management Route
    Route::get('/timer', function () {
        $activeOrders = \App\Models\Order::where('status', 'in_progress')->get();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->get();
        $completedOrders = \App\Models\Order::where('status', 'completed')->get();
        return view('admin.timer', compact('activeOrders', 'pendingOrders', 'completedOrders'));
    })->name('timer');

    // Laundry Settings Routes
    Route::post('/settings', function () {
        $validated = request()->validate([
            'jenis_pakaian' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'timer_minutes' => 'required|integer|min:1',
        ]);

        \App\Models\LaundrySetting::create($validated);

        return redirect()->route('admin.settings')
            ->with('success', 'Setting added successfully');
    })->name('settings.store');

    Route::get('/settings/{setting}/edit', function ($setting) {
        $setting = \App\Models\LaundrySetting::findOrFail($setting);
        return response()->json($setting);
    })->name('settings.edit');

    Route::put('/settings/{setting}', function ($setting) {
        $setting = \App\Models\LaundrySetting::findOrFail($setting);
        
        $validated = request()->validate([
            'jenis_pakaian' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'timer_minutes' => 'required|integer|min:1',
        ]);

        $setting->update($validated);

        return redirect()->route('admin.settings')
            ->with('success', 'Setting updated successfully');
    })->name('settings.update');

    Route::delete('/settings/{setting}', function ($setting) {
        \App\Models\LaundrySetting::findOrFail($setting)->delete();
        return redirect()->route('admin.settings')
            ->with('success', 'Setting deleted successfully');
    })->name('settings.destroy');

    // Profile Management Routes
    Route::put('/profile', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $user->update(request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]));
        return redirect()->route('admin.settings')->with('success', 'Profile updated successfully');
    })->name('profile.update');

    Route::put('/password', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $request = request()->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        if (!Hash::check($request['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        
        $user->update([
            'password' => Hash::make($request['password'])
        ]);
        
        return redirect()->route('admin.settings')->with('success', 'Password updated successfully');
    })->name('password.update');
});

Route::resource('customers', CustomerController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

// User Routes
Route::prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $totalOrders = \App\Models\Order::where('account_id', session('login_id'))->count();
        $pendingOrders = \App\Models\Order::where('account_id', session('login_id'))
            ->where('status', 'pending')
            ->count();
        $completedOrders = \App\Models\Order::where('account_id', session('login_id'))
            ->where('status', 'completed')
            ->count();
        $recentOrders = \App\Models\Order::where('account_id', session('login_id'))
            ->latest()
            ->take(5)
            ->get();
        
        return view('user.dashboard', compact('user', 'totalOrders', 'pendingOrders', 'completedOrders', 'recentOrders'));
    })->name('dashboard');

    // Orders
    Route::get('/orders', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $orders = \App\Models\Order::where('account_id', session('login_id'))
            ->latest()
            ->get();
        return view('user.orders', compact('user', 'orders'));
    })->name('orders');

    Route::get('/orders/create', function () {
        $user = \App\Models\Login::find(session('login_id'));
        return view('user.orders.create', compact('user'));
    })->name('orders.create');

    Route::post('/orders', function () {
        $validated = request()->validate([
            'jenis_pakaian' => 'required|string',
            'bahan_pakaian' => 'required|string',
            'banyak' => 'required|integer|min:1',
            'timer_duration' => 'required|integer|min:1',
        ]);

        $validated['account_id'] = session('login_id');
        $validated['status'] = 'pending';

        \App\Models\Order::create($validated);

        return redirect()->route('user.orders')
            ->with('success', 'Order created successfully');
    })->name('orders.store');

    Route::get('/orders/{order}/edit', function ($order) {
        $order = \App\Models\Order::where('account_id', session('login_id'))
            ->findOrFail($order);
        return view('user.orders.edit', compact('order'));
    })->name('orders.edit');

    Route::put('/orders/{order}', function ($order) {
        $order = \App\Models\Order::where('account_id', session('login_id'))
            ->findOrFail($order);
        
        $validated = request()->validate([
            'jenis_pakaian' => 'required|string',
            'bahan_pakaian' => 'required|string',
            'banyak' => 'required|integer|min:1',
        ]);

        $order->update($validated);

        return redirect()->route('user.orders')
            ->with('success', 'Order updated successfully');
    })->name('orders.update');

    Route::delete('/orders/{order}', function ($order) {
        $order = \App\Models\Order::where('account_id', session('login_id'))
            ->findOrFail($order);
        $order->delete();

        return redirect()->route('user.orders')
            ->with('success', 'Order deleted successfully');
    })->name('orders.destroy');

    // Settings
    Route::get('/settings', function () {
        $user = \App\Models\Login::find(session('login_id'));
        return view('user.settings', compact('user'));
    })->name('settings');

    // Profile Update
    Route::put('/profile', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $user->update(request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]));
        return redirect()->route('user.settings')->with('success', 'Profile updated successfully');
    })->name('profile.update');

    // Password Update
    Route::put('/password', function () {
        $user = \App\Models\Login::find(session('login_id'));
        $request = request()->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        if (!Hash::check($request['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        
        $user->update([
            'password' => Hash::make($request['password'])
        ]);
        
        return redirect()->route('user.settings')->with('success', 'Password updated successfully');
    })->name('password.update');
});

Route::fallback(function () {
    return abort(404);
});