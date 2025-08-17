<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold text-black">Our Services</h1>
            <p class="text-gray-600 mt-2">We don’t just provide staff—we provide peace of mind.</p>
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                @forelse($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="block bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">
                    @if($service->image_url)
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-40 object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold text-lg text-black">{{ $service->title }}</h3>
                        <p class="text-gray-600 mt-1">{{ $service->excerpt }}</p>
                    </div>
                </a>
                @empty
                <p class="text-gray-600">No services available yet.</p>
                @endforelse
            </div>
                <div class="mt-8">{{ $services->links() }}</div>
            </div>
        </section>
    </div>
</x-guest-layout>

