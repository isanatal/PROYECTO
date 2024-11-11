<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas para los productos
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Rutas de autenticación
Auth::routes();

// Ruta principal después del login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//facturas

Route::get('facturas', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('facturas', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('facturas/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
Route::put('facturas/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
Route::delete('facturas/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');


//clientes

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');