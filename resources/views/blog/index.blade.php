<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold text-black">Blog & Resources</h1>
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                @forelse($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="block bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">
                    @if($post->image_url)
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-40 object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-black">{{ $post->title }}</h3>
                        <p class="text-gray-600 mt-1">{{ $post->excerpt }}</p>
                        @if($post->published_at)
                        <p class="text-gray-400 text-sm mt-2">{{ $post->published_at->format('M d, Y') }}</p>
                        @endif
                    </div>
                </a>
                @empty
                <p class="text-gray-600">No posts yet.</p>
                @endforelse
            </div>
            <div class="mt-8">{{ $posts->links() }}</div>
            </div>
        </section>
    </div>
</x-guest-layout>

