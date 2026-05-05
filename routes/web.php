<?php

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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/products', function () {
        return view('admin.products-list');
    });

    Route::get('/products/new', function () {
        return view('admin.products-new');
    });
});
