<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Store Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('store.home');
});

Route::get('/catalogo', function () {
    return view('store.catalogo');
});

Route::get('/detalle', function () {
    return view('store.detalle');
});

Route::get('/carrito', function () {
    return view('store.carrito');
});

Route::get('/checkout', function () {
    return view('store.checkout');
});

Route::get('/perfil', function () {
    return view('store.perfil');
});

// Store Auth
Route::get('/login', [AuthController::class, 'showStoreLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Auth (public)
    Route::get('/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'adminLogin']);

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/products', function () {
            return view('admin.products-list');
        });

        Route::get('/products/new', function () {
            return view('admin.products-new');
        });
    });
});
