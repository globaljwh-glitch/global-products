<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController as FrontProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\Frontend\IndustryController as FrontendIndustryController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\OfferController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\UserController as AdminUserController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/{user}', [AdminUserController::class, 'show'])
            ->name('users.show');
    });
    
Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    
    if (!File::exists($fullPath)) {
        abort(404);
    }
    
    $mime = File::mimeType($fullPath);
    return response(File::get($fullPath), 200)
        ->header('Content-Type', $mime);
})->where('path', '.*');
// Route::prefix('admin')
//     ->name('admin.')
//     ->middleware(['auth'])
//     ->group(function () {

//         Route::resource('offers', OfferController::class);

//     });

Route::post('/newsletter/subscribe', [
    NewsletterController::class,
    'subscribe'
])->name('newsletter.subscribe');

Route::get('/newsletter/unsubscribe/{token}', [
    NewsletterController::class,
    'unsubscribe'
])->name('newsletter.unsubscribe');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/categories/search', [App\Http\Controllers\Admin\CategoryController::class, 'search'])
    ->name('categories.search');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    //Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
    Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class);
    Route::get('/products/search', [ProductController::class, 'search']);
    
});


Route::get('/terms-of-use', function () {
    return view('frontend.terms-of-use.index');
})->name('terms');

Route::get('/about-us', function () {
    return view('frontend.about-us.index');
})->name('about');

Route::get('/privacy-policy', function () {
    return view('frontend.privacy.index');
})->name('privacy');


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('products/search', [ProductController::class, 'search'])
        ->name('products.search');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
});

Route::get('/products/{type?}/{slug?}', [FrontProductController::class, 'index'])
    ->name('products.index');
Route::get('/categories', [CategoryController::class, 'index'])
->name('categories.index');
Route::get('/brands', [BrandController::class, 'index'])
->name('brands.index');
Route::get('/industries', [FrontendIndustryController::class, 'index'])
->name('industries.index');

Route::get('/contact', function () {
    return view('frontend.contact.index'); // adjust if path differs
})->name('contact');
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


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('industries', IndustryController::class);
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

    Route::resource('offers', OfferController::class);
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/newsletter-subscribers', [
            NewsletterSubscriberController::class,
            'index'
        ])->name('newsletter-subscribers.index');

        Route::get('/newsletter-subscribers/{subscriber}', [
            NewsletterSubscriberController::class,
            'show'
        ])->name('newsletter-subscribers.show');

        Route::delete('/newsletter-subscribers/{subscriber}', [
            NewsletterSubscriberController::class,
            'destroy'
        ])->name('newsletter-subscribers.destroy');
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
