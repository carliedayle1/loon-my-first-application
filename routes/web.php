<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('contact');
});

Route::get('/contact', function () {
    return view('about');
});
