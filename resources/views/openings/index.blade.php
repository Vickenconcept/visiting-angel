<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-6xl mx-auto px-4 py-12">
                <h1 class="text-3xl font-bold text-black">Job Openings</h1>
                <p class="text-gray-600 mt-2">Join our compassionate team of caregivers.</p>
                <div class="grid md:grid-cols-2 gap-6 mt-8">
                    @forelse($openings as $opening)
                    <a href="{{ route('openings.show', $opening->slug) }}" class="block bg-white border rounded-xl p-6 hover:shadow-lg transition">
                        <h3 class="font-semibold text-xl text-black">{{ $opening->title }}</h3>
                        <p class="text-gray-600 mt-1">{{ \Illuminate\Support\Str::limit(strip_tags($opening->description), 120) }}</p>
                        <div class="flex items-center text-gray-500 text-sm mt-3 gap-4">
                            <span>{{ $opening->employment_type }}</span>
                            <span>{{ $opening->location }}</span>
                        </div>
                    </a>
                    @empty
                    <p class="text-gray-600">No openings currently.</p>
                    @endforelse
                </div>
                <div class="mt-8">{{ $openings->links() }}</div>
            </div>
        </section>
    </div>
</x-guest-layout>