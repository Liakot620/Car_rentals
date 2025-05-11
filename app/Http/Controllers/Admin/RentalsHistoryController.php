<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RentalsHistoryController extends Controller
{
    public function index(){

            $userId = Auth::id();
        
            $rentals = Rental:: where('user_id',$userId)->paginate(10);
        
        return view('admin.rentals_history.index', compact('rentals'));
    }
}
