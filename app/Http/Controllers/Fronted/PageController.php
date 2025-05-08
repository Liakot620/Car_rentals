<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class PageController extends Controller
{
    public function index()
    {
        $cars=Car::all();
        return view('fronted.page.homepage',compact('cars'));
    }
    public function contect()
    {
        return view('fronted.page.contect');
    }
    public function about()
    {
        return view('fronted.page.about');
    }
}
