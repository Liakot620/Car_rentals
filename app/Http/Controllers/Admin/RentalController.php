<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $rentals = Rental::with("user","car")->get();
        }
        else{
            $userId= Auth::id();
            $rentals = Rental:: where('user_id','=',$userId)->get();
        }
        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::all(); 
        return view('admin.rentals.create',compact('users','cars')); // no $car for create
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'user_id'=> 'required',
            'car_id'=>'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'total_cost' => 'required',
            'status' => 'required',
        ]);
        Rental::create($validated);

        return redirect()->route('rentals.index')->with('success', 'rentals added successfully.');
    }

    public function edit(Rental $rental)
    {
        return view('admin.rentals.create', compact('rental'));
    }
    public function cancel(Request $request ,Rental $rental)
    {
        $rental_id = $rental->id;
        $rentals= Rental::where('id',$rental_id)->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'rentals cancel successfully.');;
    }

    public function show(Rental $rental)
    {
        return view('admin.rentals.show', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        

        $validated = $request->validate([
          
            'start_date' => 'required',
            'end_date' => 'required',
            'total_cost' => 'required',
            'status' => 'required',
        ]);

        $rental->update($validated);

        return redirect()->route('rentals.index')->with('success', 'Rentals updated successfully.');
    }

    public function destroy(Rental $rental)
    {
        
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Rentals deleted successfully.');
    }
}
