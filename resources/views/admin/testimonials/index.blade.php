@section('title', 'Testimonials')
<x-app-layout>
<div class="p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="bg-black text-white px-4 py-2 rounded-lg">New Testimonial</a>
    </div>
    <div class="mt-6 bg-white border rounded-xl overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="p-3">Name</th>
                    <th class="p-3">Role</th>
                    <th class="p-3">Published</th>
                    <th class="p-3">Updated</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $t)
                <tr class="border-t">
                    <td class="p-3">{{ $t->name }}</td>
                    <td class="p-3">{{ $t->role }}</td>
                    <td class="p-3">
                        <form action="{{ route('admin.testimonials.toggle', $t) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="relative inline-flex items-center w-12 h-7 rounded-full transition {{ $t->is_published ? 'bg-blue-500' : 'bg-gray-300' }}">
                                <span class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition {{ $t->is_published ? 'translate-x-5' : '' }}"></span>
                            </button>
                        </form>
                    </td>
                    <td class="p-3">{{ $t->updated_at->diffForHumans() }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="text-indigo-600">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-3" onclick="return confirm('Delete this testimonial?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">{{ $testimonials->links() }}</div>
    </div>
</div>
</x-app-layout>