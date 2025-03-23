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
                                        <td class="px-4 py-2 align-center border">
                                            {{ \Carbon\Carbon::parse($permission->created_at)->format('d M Y') }}</td>

                                        <td class="px-4 py-2 border text-center">
                                            <a href="{{ route('permission.edit', $permission->id) }}"
                                                class="px-4 py-2 gap-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                                Edit
                                            </a>
                                            <a href="javascript:void(0);"
                                                onclick="deletePermission({{ $permission->id }})"
                                                class="ml-2 px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $permissions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        function deletePermission(id) {
            // Show confirmation only once
            if (confirm('Are you sure you want to delete this permission?')) {
                $.ajax({
                    url: "{{ url('permission') }}/" + id,
                    type: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Store success message in sessionStorage and reload the page
                            sessionStorage.setItem("delete_success", "Permission deleted successfully!");
                            location.reload(); // Page reload to show the success message
                        } else {
                            alert('Error deleting permission.');
                        }
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                    }
                });
            }
        }

        // Display success message after reload
        document.addEventListener("DOMContentLoaded", function() {
            let successMessage = sessionStorage.getItem("delete_success");
            if (successMessage) {
                // Show success message (You can customize this as per your need)
                alert(successMessage); // You can change this to display in a specific div if required
                sessionStorage.removeItem("delete_success"); // Remove success message after it's shown
            }
        });
    </script>




</x-app-layout>
