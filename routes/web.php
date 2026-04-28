<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController as FrontProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\UserController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/products', [FrontProductController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [FrontProductController::class, 'show'])->name('products.show');
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('guest')
    ->prefix('account')
    ->name('customer.')
    ->controller(UserController::class)
    ->group(function () {

        Route::get('/register', 'registerForm')
            ->name('register');

        Route::post('/register', 'register')
            ->name('register.submit');

        Route::get('/login', 'loginForm')
            ->name('login');

        Route::post('/login', 'login')
            ->name('login.submit');

    });


/*
|--------------------------------------------------------------------------
| Customer Account (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('account')
    ->name('customer.')
    ->controller(UserController::class)
    ->group(function () {

        Route::get('/dashboard', 'myAccount')
            ->name('account');
        Route::post(
            '/customer/profile-update',
            [UserController::class, 'updateProfile']
        )->name('profile.update');

        Route::post(
            '/customer/profile-image',
            [UserController::class, 'uploadProfileImage']
        )->name('profile.image');

        Route::post('/logout', 'logout')
            ->name('logout');

    });



Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    //Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class);
    Route::get('/products/search', [ProductController::class, 'search']);
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

require __DIR__ . '/auth.php';
