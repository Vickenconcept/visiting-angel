<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-3xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold text-black">{{ $post->title }}</h1>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-xl mt-6">
            @endif
            <div class="prose max-w-none mt-6">
                {!! $post->content !!}
            </div>
            </div>
        </section>
    </div>
</x-guest-layout>

