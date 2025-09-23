<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-900 to-purple-700">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-indigo-200 font-semibold text-lg">Article</span>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    {{ $post->title }}
                </h1>
                @if($post->published_at)
                    <div class="flex items-center justify-center text-indigo-200 text-lg mb-8">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $post->published_at->format('M d, Y') }}</span>
                    </div>
                @endif
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-300 to-purple-300 mx-auto rounded-full"></div>
                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-indigo-300/20 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <section class="py-20">
            <div class="max-w-4xl mx-auto px-4">
                @if($post->image_url)
                    <div class="mb-12">
                        <div class="relative overflow-hidden rounded-3xl shadow-2xl shadow-gray-200 group">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-64 sm:h-80 md:h-96 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>
                @endif
                
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                    <div class="relative z-10">
                        <div class="prose max-w-none prose-lg prose-headings:text-gray-900 prose-p:text-gray-700 prose-strong:text-gray-900 prose-a:text-indigo-600 prose-a:no-underline hover:prose-a:underline">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-indigo-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-purple-100 rounded-full opacity-50"></div>
                </div>

                <!-- Call to Action -->
                <div class="mt-12 bg-white rounded-3xl shadow-2xl shadow-gray-200 p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                    <div class="relative z-10 text-center">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Stay Updated</h2>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Get the latest healthcare insights and industry updates delivered to your inbox.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('blog.index') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Read More Articles
                            </a>
                            <a href="{{ route('contact') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-xl font-semibold border-2 border-indigo-600 hover:bg-indigo-50 transition-colors duration-300 transform hover:-translate-y-1">
                                Contact Us
                            </a>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-indigo-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-purple-100 rounded-full opacity-50"></div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>

