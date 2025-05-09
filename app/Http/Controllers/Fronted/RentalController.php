<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function rentals(Request $request)
    {
       
        $query = Car::query();

    if ($request->filled('name')) {
        $query->where('name', $request->name);
    }

    if ($request->filled('brand')) {
        $query->where('brand', $request->brand);
    }

    if ($request->filled('daily_rent_price')) {
        $query->where('daily_rent_price', '<=', $request->daily_rent_price)
        ->Where('daily_rent_price','=',$request->daily_rent_price);
    
    }
    

    $query->where('availability', true);

    $cars = $query->get();

    return view('fronted.page.rentals', compact('cars'));
    }
}
