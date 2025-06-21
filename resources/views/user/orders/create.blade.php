<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order - {{ $user->name }}</title>
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

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-button {
            background: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-button:hover {
            background: #4338ca;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
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
            <h1 class="page-title">Create New Order</h1>
            <div class="user-info">
                <span>{{ $user->name }}</span>
            </div>
        </div>

        <div class="form-container">
            <form action="{{ route('user.orders.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="jenis_pakaian" class="form-label">Jenis Pakaian</label>
                    <select id="jenis_pakaian" name="jenis_pakaian" class="form-input" required onchange="updateBahanOptions()">
                        <option value="">Pilih Jenis Pakaian</option>
                        <option value="Kemeja" {{ old('jenis_pakaian') == 'Kemeja' ? 'selected' : '' }}>Kemeja</option>
                        <option value="Celana" {{ old('jenis_pakaian') == 'Celana' ? 'selected' : '' }}>Celana</option>
                        <option value="Kaos" {{ old('jenis_pakaian') == 'Kaos' ? 'selected' : '' }}>Kaos</option>
                        <option value="Jaket" {{ old('jenis_pakaian') == 'Jaket' ? 'selected' : '' }}>Jaket</option>
                        <option value="Dress" {{ old('jenis_pakaian') == 'Dress' ? 'selected' : '' }}>Dress</option>
                        <option value="Rok" {{ old('jenis_pakaian') == 'Rok' ? 'selected' : '' }}>Rok</option>
                        <option value="Blazer" {{ old('jenis_pakaian') == 'Blazer' ? 'selected' : '' }}>Blazer</option>
                        <option value="Jas" {{ old('jenis_pakaian') == 'Jas' ? 'selected' : '' }}>Jas</option>
                    </select>
                    @error('jenis_pakaian')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bahan_pakaian" class="form-label">Bahan Pakaian</label>
                    <select name="bahan_pakaian" id="bahan_pakaian" class="form-input" required>
                        <option value="">Pilih Bahan Pakaian</option>
                    </select>
                    @error('bahan_pakaian')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="banyak" class="form-label">Banyak</label>
                    <input type="number" id="banyak" name="banyak" class="form-input" value="{{ old('banyak') }}" required>
                    @error('banyak')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="form-button">
                    <i class="fas fa-plus"></i>
                    <span>Create Order</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        const bahanOptions = {
            'Kemeja': ['Katun', 'Linen', 'Sutra', 'Oxford', 'Flanel'],
            'Celana': ['Jeans', 'Chino', 'Kain', 'Levis', 'Denim'],
            'Kaos': ['Cotton', 'Polyester', 'Spandex', 'Viscose'],
            'Jaket': ['Denim', 'Kulit', 'Suede', 'Bomber', 'Parka'],
            'Dress': ['Sutra', 'Satin', 'Lace', 'Chiffon', 'Velvet'],
            'Rok': ['Denim', 'Pleated', 'A-line', 'Maxi', 'Mini'],
            'Blazer': ['Wool', 'Tweed', 'Linen', 'Cotton'],
            'Jas': ['Wool', 'Cashmere', 'Tweed', 'Linen']
        };

        function updateBahanOptions() {
            const jenisSelect = document.getElementById('jenis_pakaian');
            const bahanSelect = document.getElementById('bahan_pakaian');
            const selectedJenis = jenisSelect.value;

            // Clear current options
            bahanSelect.innerHTML = '<option value="">Pilih Bahan Pakaian</option>';

            // Add new options based on selected jenis
            if (selectedJenis && bahanOptions[selectedJenis]) {
                bahanOptions[selectedJenis].forEach(bahan => {
                    const option = document.createElement('option');
                    option.value = bahan;
                    option.textContent = bahan;
                    // Preserve old selected value if available
                    if ('{{ old('bahan_pakaian') }}' === bahan) {
                         option.selected = true;
                    }
                    bahanSelect.appendChild(option);
                });
            }
             // Enable/disable the materials dropdown based on whether a clothing type is selected
            bahanSelect.disabled = !selectedJenis || (bahanOptions[selectedJenis] || []).length === 0;
        }

        // Event listener for when the clothing type changes
        jenisPakaianSelect.addEventListener('change', updateBahanOptions);

        // Initial update based on the pre-selected value (if any) or default
        document.addEventListener('DOMContentLoaded', function() {
             // Set initial state based on old input or default
             if (jenisPakaianSelect.value) {
                 updateBahanOptions();
             }
         });
    </script>
</body>
</html> 