@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Customers</h1>
    <form action="{{ route('customers.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col">
                <input type="text" name="nama_customer" class="form-control" placeholder="Nama Customer" required>
            </div>
            <div class="col">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="col">
                <input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->nama_customer }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>{{ $customer->no_hp }}</td>
                <td>
                    <!-- Edit Form -->
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nama_customer" value="{{ $customer->nama_customer }}" class="form-control mb-1" required>
                        <input type="text" name="alamat" value="{{ $customer->alamat }}" class="form-control mb-1" required>
                        <input type="text" name="no_hp" value="{{ $customer->no_hp }}" class="form-control mb-1" required>
                        <button type="submit" class="btn btn-warning btn-sm mb-1">Edit</button>
                    </form>
                    <!-- Delete Form -->
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-danger">Keluar</a>
    </div>
</div>
@endsection 