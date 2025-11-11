<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/filldocs', function () {
    return view('filldocs');
})->name('filldocs');







Route::get('/', function () {
    return view('cash-advance-checklist');
});
