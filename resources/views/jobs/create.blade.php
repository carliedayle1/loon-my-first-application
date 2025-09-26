<x-layout>
    <x-slot:heading>
        Create a New Job
    </x-slot:heading>

    <div class="mx-auto max-w-2xl">
        <form method="POST" action="/jobs" class="rounded-lg border border-gray-200 bg-white p-8 shadow-sm">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Enter Job Details</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Please fill out all the fields to post a new job.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
                        <div>
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Senior Laravel Developer" 
                                    class="block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 @error('title') ring-red-500 @enderror">
                            </div>
                            @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                            <div class="mt-2">
                                <input type="text" name="salary" id="salary" value="{{ old('salary') }}" placeholder="$50,000 USD" 
                                    class="block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 @error('salary') ring-red-500 @enderror">
                            </div>
                            @error('salary')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>

                        {{-- <div>
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea name="description" id="description" rows="3" required
                                    class="block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 @error('description') ring-red-500 @enderror"></textarea>
                            </div>
                            @error('description')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div> --}}

                        <div>
                            <label for="employer_id" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
                            <div class="mt-2">
                                <select name="employer_id" id="employer_id" 
                                    class="block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 @error('employer_id') ring-red-500 @enderror">
                                    <option value="" disabled selected>Select an Employer</option>
                                    @foreach ($employers as $employer)
                                        <option value="{{ $employer->id }}" {{ old('employer_id') ? 'selected' : '' }}>{{ $employer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             @error('employer_id')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                        
                        <div>
                             <label class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                             <div class="mt-2 grid grid-cols-2 gap-x-4 gap-y-2">
                                @foreach ($tags as $tag)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" 
                                        @if(old('tags') && in_array($tag->id, old('tags'))) 
                                            checked 
                                        @endif
                                        >
                                        <span class="ml-2 text-sm text-gray-600">{{ $tag->name }}</span>
                                    </label>
                                @endforeach
                             </div>
                             @error('tags')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-center gap-x-6">
                <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">Save Job</button>
            </div>
        </form>
    </div>
</x-layout>