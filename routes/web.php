<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello Laravel dari Manda 707082400051';
});

Route::get('/profil', function () {
    return view('pages.profil',[
        'nama' => "manda hardi yanti",
        'nim' => "707082400051",
        'kelas' => 'trm03',
        'status'
    ]);
});

Route::get('/hello', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('pages.beranda',[
    'nim' => "707082400051"
    ]);
});

