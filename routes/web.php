<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\QRController;

Route::get('/', function () {
    return view('landing');
});



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/pdf', [ProductController::class, 'pdf'])->name('pdf');


Route::get('/suppliers/export-csv', [SupplierController::class, 'exportCsv'])->name('suppliers.csv');
Route::resource('suppliers', SupplierController::class);
Route::get('/scanner', function () {
    return view('scanner');
})->name('scanner');
Route::post('/scanner/scan', [SupplierrController::class, 'handleScan'])->name('scanner.scan');
Route::post('/suppliers/import', [SupplierController::class, 'import'])->name('suppliers.import');

Route::get('/qr', [QRController::class, 'index']);
Route::post('/generate-qr', [QRController::class, 'generateQR']);
