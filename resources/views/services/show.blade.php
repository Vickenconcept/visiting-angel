<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-3xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold text-black">{{ $service->title }}</h1>
            @if($service->image_url)
                <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-64 object-cover rounded-xl mt-6">
            @endif
            <p class="text-gray-700 mt-6 leading-relaxed">{!! $service->body !!}</p>
            {{-- <p class="text-gray-700 mt-6 leading-relaxed">{!! nl2br(e($service->body)) !!}</p> --}}
            </div>
        </section>
    </div>
</x-guest-layout>

