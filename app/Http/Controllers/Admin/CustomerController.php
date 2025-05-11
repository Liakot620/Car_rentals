<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rental;
use App\Models\User;    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::OrderBy('id','desc')->paginate(10);
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
        $validated['password'] = Hash::make($validated['password']);
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
