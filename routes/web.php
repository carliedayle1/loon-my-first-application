<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs', [
        'jobs' => Job::with(['employer', 'tags'])->paginate(2)
    ]);
});

Route::get('/jobs/{job}', function (Job $job) {
    return view('job', [
        'job' => $job
    ]);
});

// Route::get('/about', function () {
//     return view('contact');
// });

// Route::get('/contact', function () {
//     return view('about');
// });
