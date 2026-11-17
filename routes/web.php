<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SapaController;
use App\Http\Controllers\ProductController;
Route::get('/sapa', [SapaController::class, 'index']);

// Satu controller dapat memiliki beberapa method
Route::get('/product', [ProductController::class, 'index']); 
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);


Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama'  => 'Manda Hardi Yanti',
        'kelas' => 'D4SM-48-03',
        'nim'   => '707082400051',
    ]);
});

Route::view('/contact', 'pages.contact');

Route::get('/latihan', function () {
    $matakuliah = ['Pemrograman Web', 'Basis Data', 'UI/UX'];
    return view('pages.latihan', ['matakuliah' => $matakuliah]);
});


Route::post('/product', [ProductController::class, 'store']);
