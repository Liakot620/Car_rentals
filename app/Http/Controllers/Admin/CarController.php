<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::OrderBy('id','desc')->paginate(10);
        return view('admin.car.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.car.create'); // no $car for create
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'car_type' => 'required|string|max:255',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('admin.car.create', compact('car'));
    }

    public function show(Car $car)
    {
        return view('admin.car.show', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'car_type' => 'required|string|max:255',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
    
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
