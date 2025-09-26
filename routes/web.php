<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use SweetAlert2\Laravel\Swal;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs.index', [
        'jobs' => Job::with(['employer', 'tags'])->latest()->paginate(3)
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create', [
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
});

Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', [
        'job' => $job
    ]);
});

//Store a new job
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required'],
        'tags' => ['required']
    ], [
        'employer_id.required' => "The employer field is required."
    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id'),
    ]);

    $job->tags()->attach(array_values(request('tags')));

    Swal::success([
        'title' => 'Job added successfully',
    ]);

    return redirect('/jobs');
});

//Edit a job
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
});


//Update a job
Route::patch('/jobs/{job}', function (Job $job) {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'employer_id' => ['required'],
        'tags' => ['required']
    ], [
        'employer_id.required' => "The employer field is required."
    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id'),
    ]);

    $job->tags()->attach(array_values(request('tags')));

    Swal::success([
        'title' => 'Job updated successfully',
    ]);

    return redirect('/jobs');
});


// Destroy a Job
Route::delete('/jobs/{job}', function (Job $job) {

    $job->delete();

    Swal::info([
        'title' => 'Job deleted successfully',
    ]);
    return redirect('/jobs');
});
