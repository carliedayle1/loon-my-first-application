<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="flex justify-end">
        <a href="/jobs/create" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500">
            Create Job
        </a>
    </div>

    <div class="mt-8 space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block rounded-lg border border-gray-200 bg-white p-6 shadow-sm hover:border-blue-400">
                <div class="flex items-center justify-between">
                    <div class="text-sm font-medium text-gray-500">{{ $job->employer->name }}</div>
                </div>

                <div class="mt-4 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $job->title }}</h3>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($job->tags as $tag)
                                <span class="rounded-full bg-gray-200 px-3 py-1 text-xs font-medium text-gray-800">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3 sm:mt-0">
                        <p class="text-lg font-bold text-green-600">${{ $job->salary }} / Year</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>