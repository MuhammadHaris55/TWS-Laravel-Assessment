<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;



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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


//Customer crud routings ---------------- starts -------------------------------

Route::get('customers', [CustomerController::class, 'index'])
    ->name('customers')
    ->middleware('auth');

Route::get('customers/create', [CustomerController::class, 'create'])
    ->name('customers.create')
    ->middleware('auth');

Route::get('customers/{customer}', [CustomerController::class, 'show'])
    ->name('customers.show')
    ->middleware('auth');

Route::post('customers', [CustomerController::class, 'store'])
    ->name('customers.store')
    ->middleware('auth');

Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])
    ->name('customers.edit')
    ->middleware('auth');

Route::put('customers/{customer}', [CustomerController::class, 'update'])
    ->name('customers.update')
    ->middleware('auth');

Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])
    ->name('customers.destroy')
    ->middleware('auth');

//Customer crud routings ---------------- end -------------------------------

//==========================================================================================================//


//Product crud routings ---------------- starts -------------------------------

Route::get('products', [ProductController::class, 'index'])
    ->name('products')
    ->middleware('auth');

Route::get('products/create', [ProductController::class, 'create'])
    ->name('products.create')
    ->middleware('auth');

Route::get('products/{product}', [ProductController::class, 'show'])
    ->name('products.show')
    ->middleware('auth');

Route::post('products', [ProductController::class, 'store'])
    ->name('products.store')
    ->middleware('auth');

Route::get('products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit')
    ->middleware('auth');

Route::put('products/{product}', [ProductController::class, 'update'])
    ->name('products.update')
    ->middleware('auth');

Route::delete('products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy')
    ->middleware('auth');


//Product crud routings ---------------- end -------------------------------


//==========================================================================================================//


//Sales crud routings ---------------- starts -------------------------------

Route::get('sales', [SaleController::class, 'index'])
    ->name('sales')
    ->middleware('auth');

Route::get('sales/create', [SaleController::class, 'create'])
    ->name('sales.create')
    ->middleware('auth');

Route::get('sales/{sale}', [SaleController::class, 'show'])
    ->name('sales.show')
    ->middleware('auth');

Route::post('sales', [SaleController::class, 'store'])
    ->name('sales.store')
    ->middleware('auth');

Route::get('sales/{sale}/edit', [SaleController::class, 'edit'])
    ->name('sales.edit')
    ->middleware('auth');

Route::put('sales/{sale}', [SaleController::class, 'update'])
    ->name('sales.update')
    ->middleware('auth');

Route::delete('sales/{sale}', [SaleController::class, 'destroy'])
    ->name('sales.destroy')
    ->middleware('auth');


//Sales crud routings ---------------- end -------------------------------
