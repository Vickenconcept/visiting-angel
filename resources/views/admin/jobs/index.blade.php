@section('title', 'Openings')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Job Openings Management</h1>
                <p class="text-gray-600 text-lg">Manage your healthcare job openings and career opportunities</p>
            </div>
            <a href="{{ route('admin.openings.create') }}" class="bg-gradient-to-r from-orange-600 to-yellow-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-orange-700 hover:to-yellow-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-plus text-xl mr-2'></i>
                    New Opening
                </span>
            </a>
        </div>
    </div>

    <!-- Job Openings Table -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-600 to-yellow-600"></div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="p-4 font-semibold text-gray-900 text-lg">Position</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Type</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Status</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Last Updated</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($openings as $opening)
                        <tr class="border-t border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="p-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-100 to-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class='bx bx-briefcase-alt-2 text-orange-600 text-lg'></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $opening->title }}</div>
                                        <div class="text-sm text-gray-500">{{ $opening->location ?? 'Location not specified' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $opening->employment_type }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $opening->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $opening->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600">{{ $opening->updated_at->diffForHumans() }}</td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.openings.edit', $opening) }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-200 transition-colors duration-300">
                                        <i class='bx bx-edit text-sm mr-1'></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.openings.destroy', $opening) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-medium hover:bg-red-200 transition-colors duration-300" onclick="return confirm('Delete this opening?')">
                                            <i class='bx bx-trash text-sm mr-1'></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $openings->links() }}
        </div>
    </div>
</div>
</x-app-layout>

