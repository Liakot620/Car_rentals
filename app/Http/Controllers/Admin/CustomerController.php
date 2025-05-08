<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;    
use App\Models\Rental;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        User::create($validated);

        return redirect()->route('customers.index')->with('success', 'customer added successfully.');
    }

    public function edit(User $customer)
    {
        return view('admin.customers.create', compact('customer'));
    }

    public function show(Request $request ,User $customer)
    {
        $rentals = Rental::with('car')->where('id',$customer->id)->get();
        return view('admin.customers.show', compact('customer', 'rentals'));
    }

    public function update(Request $request, User $customer)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'customers updated successfully.');
    }

    public function destroy(User $customer)
    {
        
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'custome deleted successfully.');
    }
}
