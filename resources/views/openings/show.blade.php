<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-emerald-900 to-teal-700">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-emerald-200 font-semibold text-lg">Career Opportunity</span>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    {{ $opening->title }}
                </h1>
                <div class="flex flex-wrap justify-center items-center gap-4 mb-8">
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $opening->employment_type }}
                    </span>
                    <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $opening->location }}
                    </span>
                    @if($opening->salary)
                        <span class="bg-emerald-500 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $opening->salary }}
                        </span>
                    @endif
                </div>
                <div class="w-24 h-1 bg-gradient-to-r from-emerald-300 to-teal-300 mx-auto rounded-full"></div>
                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-emerald-300/20 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <section class="py-20">
            <div class="max-w-4xl mx-auto px-4">
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-600 to-teal-600"></div>
                    <div class="relative z-10">
                        <div class="prose max-w-none prose-lg">
                            {!! $opening->description !!}
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-emerald-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-teal-100 rounded-full opacity-50"></div>
                </div>

                @if($opening->is_active)
                    <div class="mt-12 bg-white rounded-3xl shadow-2xl shadow-gray-200 p-8 md:p-12 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-emerald-600 to-teal-600"></div>
                        <div class="relative z-10">
                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">Apply for this Position</h2>
                                <p class="text-gray-600 text-lg">Ready to join our team? Fill out the application form below.</p>
                            </div>
                            <form action="{{ route('openings.apply', $opening->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                        <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors duration-300" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                        <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors duration-300" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                        <input type="text" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors duration-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Resume (PDF/DOC)</label>
                                        <input type="file" name="resume" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors duration-300" accept=".pdf,.doc,.docx">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cover Letter / Message</label>
                                    <textarea name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors duration-300 resize-none" placeholder="Tell us why you're interested in this position..."></textarea>
                                </div>
                                <div class="text-center">
                                    <button class="bg-emerald-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-emerald-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                        <span class="flex items-center justify-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                            </svg>
                                            Submit Application
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-emerald-100 rounded-full opacity-50"></div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-teal-100 rounded-full opacity-50"></div>
                    </div>
                @else
                    <div class="mt-12 bg-yellow-50 border-2 border-yellow-200 rounded-3xl p-8 text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-yellow-500 to-orange-500"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-yellow-800 mb-4">Position Closed</h3>
                            <p class="text-yellow-700 text-lg">This job opening has been closed. Please check our other available positions.</p>
                            <div class="mt-6">
                                <a href="{{ route('openings.index') }}" class="bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-yellow-700 transition-colors duration-300">
                                    View Other Positions
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-guest-layout>