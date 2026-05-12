<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

// Flux Fallback Routes for Production
Route::get('/flux/flux.js', function () {
    return Response::file(public_path('vendor/flux/flux.js'), [
        'Content-Type' => 'application/javascript',
    ]);
});
Route::get('/flux/flux.css', function () {
    return Response::file(public_path('vendor/flux/flux.css'), [
        'Content-Type' => 'text/css',
    ]);
});

/*
|--------------------------------------------------------------------------
| Store Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('/catalogo', [StoreController::class, 'catalogo'])->name('catalogo');
Route::get('/categorias', [StoreController::class, 'categorias'])->name('categorias');
Route::get('/categorias/{category:slug}', [StoreController::class, 'categoria'])->name('categoria');
Route::get('/producto/{product:slug}', [StoreController::class, 'detalle'])->name('detalle');
Route::get('/ofertas', [StoreController::class, 'ofertas'])->name('ofertas');

Route::get('/carrito', function () {
    return view('store.carrito');
})->name('carrito');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [StoreController::class, 'checkout'])->name('checkout');
    Route::get('/perfil', [StoreController::class, 'perfil'])->name('perfil');
});

Route::get('/contacto', function () {
    return view('store.contacto');
})->name('contacto');

Route::get('/info/{slug}', function ($slug) {
    return view('store.info', ['slug' => $slug]);
})->name('info');

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

        // Products CRUD
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/new', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

        // Missing Admin Routes (Placeholders)
        Route::get('/orders', function () { return view('admin.dashboard'); })->name('admin.orders.index');
        Route::get('/users', function () { return view('admin.dashboard'); })->name('admin.users.index');
        Route::get('/settings', function () { return view('admin.dashboard'); })->name('admin.settings');
    });
});
