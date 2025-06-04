@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Lupa Password</h2>
    <form action="{{ route('forgot') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        <a href="{{ route('login') }}" class="btn btn-link w-100 mt-2">Kembali ke Login</a>
    </form>
</div>
@endsection 