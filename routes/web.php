<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;




 Route::get('/', [HomeController::class, 'index'])->name('home.index');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    //Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class);
});

// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->except(['show']);
// });

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('products', [ProductController::class, 'index'])->name('products.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');

    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});


// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

//     Route::get('products/{product}', function ($product) {
//         return redirect()->route('admin.products.edit', $product);
//     });

//     Route::resource('products', App\Http\Controllers\Admin\ProductController::class)
//         ->except(['show']);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
