<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
   public function car_view_rent(Request $request){
      $car_id = $request->id;
      $car_details = Car::where('id', $car_id)->first();
     return view('fronted.page.car-view-rent',compact('car_details'));
   }

   public function submitRent(Request $request){

    
         $validated = $request->validate([
              'start_date' => 'required|date|date_equals:today',
              'end_date' => 'required|date|after_or_equal:start_date'
         ]);
         
         $startDate = Carbon::parse($validated['start_date']);
         $endDate = Carbon::parse($validated['end_date']);
         $rentalDays = $startDate->diffInDays($endDate)+1;
         
         $car = Car::findOrFail($request->id);

         $pricePerDay= $car->daily_rent_price;
   
         $totalPrice = $rentalDays * $pricePerDay;
        
         $user_id = Auth::id();
         $car_id = $car->id;
   
        
          Rental::create([
            'user_id'=> $user_id,
            'car_id'=> $car_id,
             'start_date' => $startDate,
             'end_date' => $endDate,
             'total_cost' => $totalPrice,
         ]);
         return redirect()->back()->with('success','rent is successfully');
     }
     
}
