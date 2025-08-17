@section('title', 'Blog')
<x-app-layout>
<div class="p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Blog Posts</h1>
        <a href="{{ route('admin.blog.create') }}" class="bg-black text-white px-4 py-2 rounded-lg">New Post</a>
    </div>
    <div class="mt-6 bg-white border rounded-xl overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="p-3">Title</th>
                    <th class="p-3">Published</th>
                    <th class="p-3">Updated</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr class="border-t">
                    <td class="p-3">{{ $post->title }}</td>
                    <td class="p-3">
                        <form action="{{ route('admin.blog.toggle', $post) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="relative inline-flex items-center w-12 h-7 rounded-full transition {{ $post->is_published ? 'bg-blue-500' : 'bg-gray-300' }}">
                                <span class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition {{ $post->is_published ? 'translate-x-5' : '' }}"></span>
                            </button>
                        </form>
                    </td>
                    <td class="p-3">{{ $post->updated_at->diffForHumans() }}</td>
                    <td class="p-3 text-right">
                        <a href="{{ route('admin.blog.edit', $post) }}" class="text-indigo-600">Edit</a>
                        <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-3" onclick="return confirm('Delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-3">{{ $posts->links() }}</div>
    </div>
 </div>
</x-app-layout>

