<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form class="row g-3 form-control" action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 form-control">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control text-blue" id="name" name="name"  value="{{ old('name') }}">

                        </div>
                        <button type="submit" class="btn btn-primary form-control btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
