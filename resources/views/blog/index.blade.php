<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-900 to-purple-700">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-indigo-200 font-semibold text-lg">Latest Insights</span>
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
                    Blog & <span class="text-indigo-300 bg-gradient-to-r from-indigo-300 to-purple-300 bg-clip-text text-transparent">Resources</span>
                </h1>
                <p class="text-xl md:text-2xl leading-relaxed text-indigo-100 max-w-3xl mx-auto mb-8">
                    Stay informed with the latest insights, tips, and updates from the healthcare industry.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-300 to-purple-300 mx-auto rounded-full"></div>
                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-indigo-300/20 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-semibold mb-4">
                        Healthcare Insights
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Latest Articles & Resources</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Expert insights, industry trends, and practical tips for healthcare professionals</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto rounded-full mt-6"></div>
                </div>
                
                @if($posts->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts as $post)
                        <article class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="block relative z-10">
                                @if($post->image_url)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                        <div class="absolute top-4 left-4">
                                            <span class="bg-white/90 text-indigo-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                Article
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-indigo-100 to-purple-200 flex items-center justify-center group-hover:from-indigo-200 group-hover:to-purple-300 transition-all duration-300">
                                        <svg class="w-16 h-16 text-indigo-400 group-hover:text-indigo-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="p-8">
                                    <div class="flex items-center text-sm text-gray-500 mb-4">
                                        @if($post->published_at)
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>{{ $post->published_at->format('M d, Y') }}</span>
                                        @endif
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors duration-300 line-clamp-2">{{ $post->title }}</h3>
                                    <p class="text-gray-600 leading-relaxed mb-6 line-clamp-3">{{ $post->excerpt }}</p>
                                    <div class="flex items-center text-indigo-600 font-semibold group-hover:text-indigo-700 transition-colors duration-300">
                                        <span>Read More</span>
                                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </article>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Articles Yet</h3>
                        <p class="text-gray-600 text-lg">We're working on creating valuable content for you. Check back soon for the latest insights!</p>
                    </div>
                @endif

                @if($posts->hasPages())
                    <div class="mt-16 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Newsletter Signup -->
        <section class="py-20 bg-gradient-to-r from-indigo-50 to-purple-50 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23e0e7ff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-600 to-purple-600"></div>
                    <div class="relative z-10">
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">Stay Updated</h2>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Get the latest healthcare insights, industry news, and expert tips delivered directly to your inbox.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                            <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            <button class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Subscribe
                            </button>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-indigo-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-purple-100 rounded-full opacity-50"></div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>

