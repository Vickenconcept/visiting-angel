@section('title', 'Testimonials')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Testimonials Management</h1>
                <p class="text-gray-600 text-lg">Manage client testimonials and reviews</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="bg-gradient-to-r from-pink-600 to-rose-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-pink-700 hover:to-rose-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-plus text-xl mr-2'></i>
                    New Testimonial
                </span>
            </a>
        </div>
    </div>

    <!-- Testimonials Table -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-600 to-rose-600"></div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="p-4 font-semibold text-gray-900 text-lg">Client</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Role</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Status</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg">Last Updated</th>
                            <th class="p-4 font-semibold text-gray-900 text-lg text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $t)
                        <tr class="border-t border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="p-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-100 to-rose-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class='bx bx-message-rounded-dots text-pink-600 text-lg'></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ $t->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($t->quote, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $t->role ?? 'Not specified' }}
                                </span>
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.testimonials.toggle', $t) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="relative inline-flex items-center w-14 h-8 rounded-full transition-all duration-300 {{ $t->is_published ? 'bg-pink-500 shadow-lg shadow-pink-500/25' : 'bg-gray-300' }}">
                                        <span class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md {{ $t->is_published ? 'translate-x-6' : '' }}"></span>
                                    </button>
                                </form>
                            </td>
                            <td class="p-4 text-gray-600">{{ $t->updated_at->diffForHumans() }}</td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-200 transition-colors duration-300">
                                        <i class='bx bx-edit text-sm mr-1'></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-medium hover:bg-red-200 transition-colors duration-300" onclick="return confirm('Delete this testimonial?')">
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
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
</x-app-layout>