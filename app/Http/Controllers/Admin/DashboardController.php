<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'customer'){

        $userId = Auth::id();

         $data['rentals']= Rental::where('status','completed')
            ->where('user_id',$userId)
            ->count();

        $data['car'] = Rental:: where('user_id',$userId)
                     ->count();

        $data['avaliable']= Car::where('availability',true)
                           ->count();

        $data['total_amount']= Rental::where('user_id',$userId)
                                ->where('status','completed')
                               ->sum('total_cost');
        }else{
        $data['car'] = Car::all()->count();
        $data['avaliable']= Car::where('availability',true)->count();
        $data['rentals']= Rental::where('status','completed')->count();
        $data['total_amount']= Rental::where('status','completed')->sum('total_cost');
        }
        return view('admin.dashboard.index',compact('data'));
    }
}
