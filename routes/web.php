<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Customer Route
    Route::controller(App\HTTP\Controllers\Admin\CustomerController::class)->group(function(){
        Route::get('/customer', 'index'); //main view
        Route::get('/customer/create', 'create'); //add customer
        Route::post('/customer', 'store'); //store customer
        Route::get('/customer/{customer}/edit', 'edit'); //edit customer
        Route::put('/customer/{customer}', 'update'); 
        Route::get('/customer/{customer}/print', 'print'); //print customer
        Route::get('/customer/{customer}/view', 'view'); //view customer
    });

    //Stock Controller
    Route::controller(App\HTTP\Controllers\Admin\StockController::class)->group(function(){
        Route::get('/stocks', 'index');
        Route::get('/stocks/create', 'create');
        Route::post('/stocks', 'store');
        Route::get('/stocks/{stocks}/edit', 'edit');
        Route::get('/stocks/{stocks}/print', 'print');
        Route::put('/stocks/{stocks}', 'update');
    });

    //Product Route
    Route::get('/products', App\Http\Livewire\Admin\Product\Index::class);

    //Eyes Controller
    Route::controller(App\HTTP\Controllers\Admin\EyeController::class)->group(function(){
        Route::get('/eyes', 'index'); //view customer eyes
        Route::get('/eyes/create', 'create'); //add customer eyes data
        Route::post('/eyes', 'store'); //store customer eyes data
        Route::get('/eyes/{eyes}/print', 'print'); //print customer eye record
        Route::delete('/eyes/{id}','destroy')->name('eyes.destroy'); //delete customer eye record
        Route::get('/eyes/{eyes}/edit', 'edit'); //edit eye
        Route::put('/eyes/{eyes}','update'); //update and store eye
            
        });

    });




    