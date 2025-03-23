<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permission') }}
            </h2>
            <a href="{{ route('permission.create') }}" class="ml-4">
                <x-primary-button>
                    {{ __('Create') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-message></x-message>

                    <table class="table-fixed w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="w-1/2 px-4 py-2 border">Permission Name</th>
                                <th class="w-1/2 px-4 py-2 border">created at</th>
                                <th class="w-1/2 px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $permission->name }}</td>
                                        <td class="px-4 py-2 align-center border">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>

                                        {{-- <td class="px-4 py-2 border">
                                            <a href="{{ route('permission.edit', $permission->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td> --}}
                                        <td class="px-4 py-2 border text-center">
                                            <a href="#"
                                                class="px-4 py-2 gap-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                                Edit
                                            </a>
                                            <a href="#"
                                                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                                Delete
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
