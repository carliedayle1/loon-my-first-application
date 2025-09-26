<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

// Route::get('/about', function () {
//     return view('contact');
// });

// Route::get('/contact', function () {
//     return view('about');
// });
