<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    // ->only(['index', 'store'])
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('sample', SampleController::class)
    // ->only(['index', 'store'])
    ->only(['index', 'store', 'edit', 'update', 'destroy', 'calculateResult'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Products //
Route::get('/products', [ProductsController::class, 'index'])->name('product.index'); // route for products/index.blade.php //
Route::post('/products', [ProductsController::class, 'store'])->name('product.store'); // route for store in ProductsController //
Route::get('/products', [ProductsController::class, 'edit'])->name('product.edit'); // route for products/edit.blade.php //
Route::patch('/products', [ProductsController::class, 'update'])->name('product.update'); // route for update in ProductsController //
Route::delete('/products', [ProductsController::class, 'destroy'])->name('product.destroy'); // route for destroy in ProductsController //



require __DIR__.'/auth.php';
