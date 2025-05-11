<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CarBook;


class CarController extends Controller
{
     public function car_view_rent(Request $request)
     {
          $car_id = $request->id;
          $car_details = Car::where('id', $car_id)->first();
          return view('fronted.page.car-view-rent', compact('car_details'));
     }

     public function submitRent(Request $request)
     {

          $validated = $request->validate([
               'start_date' => 'required|date',
               'end_date' => 'required|date'
          ]);
          $startDate = Carbon::parse($validated['start_date']);
          $endDate = Carbon::parse($validated['end_date']);
          $rentalDays = $startDate->diffInDays($endDate) + 1;

          $car = Car::findOrFail($request->id);

          $pricePerDay = $car->daily_rent_price;

          $totalPrice = $rentalDays * $pricePerDay;
          $user_id = Auth::id();
          $car_id = $car->id;

          if (!$car->availability) {
               return redirect()->back()->with('error', 'This car is currently not available for rent.');
          }

          $overlap = Rental::where('car_id', $car->id)
               ->where(function ($query) use ($request) {
                    $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                         ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                         ->orWhere(function ($query) use ($request) {
                              $query->where('start_date', '<', $request->start_date)
                                   ->where('end_date', '>', $request->end_date);
                         });
               })
               ->exists();

          if ($overlap) {
               return redirect()->back()->with('error', 'The car is already booked for the selected dates.');
          }

          $rent = Rental::create([
               'user_id' => $user_id,
               'car_id' => $car_id,
               'start_date' => $startDate,
               'end_date' => $endDate,
               'total_cost' => $totalPrice,
          ]);

           Mail::to('admin@gmail.com')->send(new CarBook($rent));
           Mail::to(auth::user()->email)->send(new CarBook($rent));


          return redirect()->route('rentals.index')->with('success', 'Car booked successfully and email sent!'); 
    }
}
