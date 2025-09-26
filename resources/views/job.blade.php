<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>
    
    <a href="/jobs" class="text-blue-500 hover:underline">&larr; Back to Listings</a>

    <div class="mt-6 rounded-lg border border-gray-200 bg-white p-8 shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-600">{{ $job->employer->name }}</h2>
            </div>
            <p class="text-2xl font-bold text-green-600">{{ $job->salary }} / Year</p>
        </div>

        <div class="mt-4 flex flex-wrap gap-2">
            @foreach ($job->tags as $tag)
                <span class="rounded-full bg-gray-200 px-3 py-1 text-sm font-medium text-gray-800">{{ $tag->name }}</span>
            @endforeach
        </div>

        <hr class="my-6 border-gray-200">

        <div>
            <h3 class="text-xl font-bold text-gray-900">About The Role</h3>
            <p class="mt-4 leading-relaxed text-gray-700">
                {{-- Assuming you have a 'description' column on your jobs table --}}
                {{-- {{ $job->description }} --}}
            </p>
        </div>
        
        <div class="mt-8">
            <a href="#" class="inline-block rounded-md bg-blue-500 px-6 py-3 font-bold text-white shadow-md transition duration-300 hover:bg-blue-600">
                Apply Now
            </a>
        </div>
    </div>
</x-layout>