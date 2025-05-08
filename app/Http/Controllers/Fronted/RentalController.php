<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function rentals()
    {
        
        $cars=Car::where('availability',true)->get();
        return view('fronted.page.rentals',compact('cars'));
    }
}
