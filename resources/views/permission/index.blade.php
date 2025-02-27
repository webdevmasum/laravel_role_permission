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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <td class="border px-4 py-2">{{ $permission->name }}</td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="border px-4 py-2 text-center text-red-500">
                                        No permissions found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
