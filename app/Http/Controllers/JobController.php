<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => Job::with(['employer', 'tags'])->latest()->paginate(3)
        ]);
    }

    public function create()
    {
        return view('jobs.create', [
            'employers' => Employer::all(),
            'tags' => Tag::all()
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store()
    {
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
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
            'employers' => Employer::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Job $job)
    {
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
    }

    public function destroy(Job $job)
    {

        $job->delete();

        Swal::info([
            'title' => 'Job deleted successfully',
        ]);
        return redirect('/jobs');
    }
}
