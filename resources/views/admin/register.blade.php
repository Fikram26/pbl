<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - The Third Interprenuer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #e6f0fa;
            font-family: 'Montserrat', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #4636db;
            color: #fff;
            padding: 18px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 0 0 28px 28px;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 1.4rem;
            font-weight: bold;
        }
        .navbar .logo span {
            margin-left: 10px;
        }
        .register-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            margin-top: 30px;
        }
        .register-card {
            display: flex;
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 0 24px rgba(70,54,219,0.08);
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }
        .register-form-section {
            flex: 1;
            padding: 48px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .register-form-section h2 {
            text-align: center;
            margin-bottom: 32px;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 24px;
            position: relative;
            width: 100%;
            max-width: 260px;
            margin-left: auto;
            margin-right: auto;
        }
        .form-group input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: none;
            border-radius: 16px;
            background: #bfe1fa;
            font-size: 1rem;
            outline: none;
            transition: box-shadow 0.2s;
            display: block;
        }
        .form-group input:focus {
            box-shadow: 0 0 0 2px #4636db33;
        }
        .form-group .fa {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #4636db;
            font-size: 1.2rem;
            pointer-events: none;
        }
        .register-btn {
            width: 60%;
            margin: 0 auto;
            display: block;
            padding: 14px 0;
            border: none;
            border-radius: 16px;
            background: linear-gradient(90deg, #8ec5fc 0%, #6e8efb 100%);
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 16px;
            transition: background 0.2s;
        }
        .register-btn:hover {
            background: linear-gradient(90deg, #6e8efb 0%, #8ec5fc 100%);
        }
        .register-form-section .error {
            color: #dc3545;
            margin-bottom: 16px;
            text-align: center;
        }
        .register-image-section {
            flex: 1;
            background: #4636db;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0 24px 24px 0;
        }
        .register-image-section img {
            width: 90%;
            max-width: 320px;
            border-radius: 24px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
        }
        .back-btn {
            position: fixed;
            left: 40px;
            bottom: 40px;
            background: #4636db;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px #4636db22;
            text-decoration: none;
        }
        @media (max-width: 900px) {
            .register-card {
                flex-direction: column;
                max-width: 95vw;
            }
            .register-image-section {
                border-radius: 0 0 24px 24px;
                padding: 24px 0;
            }
        }
        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 18px 16px;
            }
            .register-form-section, .register-image-section {
                padding: 24px 12px;
            }
            .back-btn {
                left: 12px;
                bottom: 12px;
                padding: 8px 18px;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <span style="font-size:2rem;">&#129527;</span>
            <span>The Third Interprenuer</span>
        </div>
    </div>
    <div class="register-wrapper">
        <div class="register-card">
            <div class="register-form-section">
                <h2>Register Admin</h2>
                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="register-btn">Register</button>
                </form>
            </div>
            <div class="register-image-section">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Admin Registration">
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="back-btn"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
</body>
</html> 