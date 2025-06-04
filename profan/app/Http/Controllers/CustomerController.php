<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        Customer::create($request->all());
        return redirect()->route('admin.customer');
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        $customer->update($request->all());
        return redirect()->route('admin.customer');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customer');
    }
} 