@section('title', 'Openings')
<x-app-layout>
<div class="p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Openings</h1>
        <a href="{{ route('admin.openings.create') }}" class="bg-black text-white px-4 py-2 rounded-lg">New Opening</a>
    </div>
    <div class="mt-6 bg-white border rounded-xl overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="p-3">Title</th>
                    <th class="p-3">Type</th>
                    <th class="p-3">Active</th>
                    <th class="p-3">Updated</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($openings as $opening)
                <tr class="border-t">
                    <td class="p-3">{{ $opening->title }}</td>
                    <td class="p-3">{{ $opening->employment_type }}</td>
                    <td class="p-3">{{ $opening->is_active ? 'Yes' : 'No' }}</td>
                    <td class="p-3">{{ $opening->updated_at->diffForHumans() }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('admin.openings.edit', $opening) }}" class="text-indigo-600">Edit</a>
                        <form action="{{ route('admin.openings.destroy', $opening) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-3" onclick="return confirm('Delete this opening?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">{{ $openings->links() }}</div>
    </div>
 </div>
</x-app-layout>

