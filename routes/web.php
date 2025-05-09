<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalsHistoryController;

use App\Http\Controllers\Fronted\CarController as FrontedCarController;
use App\Http\Controllers\Fronted\RentalController as FrontedRentalController;
use App\Http\Controllers\Fronted\PageController as FrontedPageController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// })

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



//Admin Routes
Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', action: [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified','role:admin']);

    Route::get('/cars/show/{car}', [CarController::class, 'show'])->name("cars.show");

    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');


    Route::get('/rentals/show/{rental}', [RentalController::class, 'show'])->name("rentals.show");

    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
    Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
    Route::get('/rentals/{rental}/cancel', [RentalController::class, 'cancel'])->name('rentals.cancel');
    Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update');
    Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');

    Route::get('/customers/show/{customer}', [CustomerController::class, 'show'])->name("customers.show");

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');


    Route::get("/rentals_history",[RentalsHistoryController::class,'index']);


});



Route::get('/', [FrontedPageController::class, 'index']);
Route::get('/contect', [FrontedPageController::class, 'contect']);
Route::get('/about', [FrontedPageController::class, 'about']);
Route::get('/rentals', [FrontedRentalController::class, 'rentals'])->name('rentals');
Route::get('/cars-view-rent/{id}', [FrontedCarController::class, 'car_view_rent']);

Route::post('/submitRent/{id}', [FrontedCarController::class, 'submitRent'])->middleware(['auth', 'verified','role:customer']);
