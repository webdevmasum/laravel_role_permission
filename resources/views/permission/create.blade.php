<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Permission/Create
            </h2>
            <a href="{{ route('permission.index') }}" class="ml-4">
                <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md shadow">
                    {{ __('Back to List') }}
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-200">Name:</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-300 focus:border-indigo-500
                                text-black @error('name') border-red-500 @enderror"
                                placeholder="Write name here..." value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-md transition">
                            Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
