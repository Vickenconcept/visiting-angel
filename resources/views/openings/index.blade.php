<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-emerald-900 to-teal-700">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-emerald-200 font-semibold text-lg">Career Opportunities</span>
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
                    Join Our <span class="text-emerald-300 bg-gradient-to-r from-emerald-300 to-teal-300 bg-clip-text text-transparent">Team</span>
                </h1>
                <p class="text-xl md:text-2xl leading-relaxed text-emerald-100 max-w-3xl mx-auto mb-8">
                    Join our compassionate team of caregivers and make a meaningful difference in people's lives.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-emerald-300 to-teal-300 mx-auto rounded-full"></div>
                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-emerald-300/20 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Job Openings Grid -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold mb-4">
                        Open Positions
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Current Job Openings</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover rewarding career opportunities in healthcare with our growing team</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-emerald-600 to-teal-600 mx-auto rounded-full mt-6"></div>
                </div>
                
                @if($openings->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($openings as $opening)
                        <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 to-teal-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <a href="{{ route('openings.show', $opening->slug) }}" class="block relative z-10">
                                <div class="p-8">
                                    <div class="flex items-start justify-between mb-6">
                                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center group-hover:bg-emerald-200 transition-colors duration-300">
                                            <svg class="w-6 h-6 text-emerald-600 group-hover:text-emerald-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                            </svg>
                                        </div>
                                        <span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm font-semibold group-hover:bg-emerald-200 transition-colors duration-300">
                                            {{ $opening->employment_type }}
                                        </span>
                                    </div>
                                    
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-emerald-600 transition-colors duration-300 line-clamp-2">{{ $opening->title }}</h3>
                                    
                                    <p class="text-gray-600 leading-relaxed mb-6 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($opening->description), 120) }}</p>
                                    
                                    <div class="flex items-center text-gray-500 text-sm mb-6">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>{{ $opening->location }}</span>
                                    </div>
                                    
                                    <div class="flex items-center text-emerald-600 font-semibold group-hover:text-emerald-700 transition-colors duration-300">
                                        <span>View Details</span>
                                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Open Positions</h3>
                        <p class="text-gray-600 text-lg">We're not currently hiring, but we'd love to hear from you! Send us your resume for future opportunities.</p>
                    </div>
                @endif

                @if($openings->hasPages())
                    <div class="mt-16 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-4 w-full">
                            {{ $openings->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Why Work With Us -->
        <section class="py-20 bg-gradient-to-r from-emerald-50 to-teal-50 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23d1fae5" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold mb-4">
                        Our Culture
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Why Work With Us?</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Join a team that values compassion, growth, and making a real difference in healthcare.</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-emerald-600 to-teal-600 mx-auto rounded-full mt-6"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 text-center hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Professional Growth</h3>
                        <p class="text-gray-600 leading-relaxed">Continuous training and development opportunities to advance your healthcare career.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 text-center hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Meaningful Work</h3>
                        <p class="text-gray-600 leading-relaxed">Make a real difference in people's lives through compassionate care and support.</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 text-center hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Supportive Team</h3>
                        <p class="text-gray-600 leading-relaxed">Work with a caring team that supports your professional and personal growth.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-600 to-teal-600"></div>
                    <div class="relative z-10">
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">Ready to Make a Difference?</h2>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Even if we don't have current openings, we'd love to hear from passionate healthcare professionals. Send us your resume!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('contact') }}" class="bg-emerald-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-emerald-700 transition-colors duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Contact Us
                            </a>
                            <a href="{{ route('about') }}" class="bg-white text-emerald-600 px-8 py-4 rounded-xl font-semibold border-2 border-emerald-600 hover:bg-emerald-50 transition-colors duration-300 transform hover:-translate-y-1">
                                Learn About Us
                            </a>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-emerald-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-teal-100 rounded-full opacity-50"></div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>