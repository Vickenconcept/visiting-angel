<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-900 to-blue-700">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24">
            <div class="text-center text-white">
                <div class="mb-8">
                    <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-blue-200 font-semibold text-lg">Comprehensive Solutions</span>
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
                    Our <span class="text-blue-300 bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">Services</span>
                </h1>
                <p class="text-xl md:text-2xl leading-relaxed text-blue-100 max-w-3xl mx-auto mb-8">
                    We don't just provide staff—we provide peace of mind through comprehensive healthcare solutions.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-300 to-cyan-300 mx-auto rounded-full"></div>
                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-16 h-16 bg-blue-300/20 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-4">
                        What We Offer
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Our Healthcare Services</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional healthcare staffing solutions tailored to your specific needs</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-cyan-600 mx-auto rounded-full mt-6"></div>
                </div>
                
                @if($services->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($services as $service)
                        <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-cyan-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <a href="{{ route('services.show', $service->slug) }}" class="block relative z-10">
                                @if($service->image_url)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                        <div class="absolute top-4 left-4">
                                            <span class="bg-white/90 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                Service
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-blue-100 to-cyan-200 flex items-center justify-center group-hover:from-blue-200 group-hover:to-cyan-300 transition-all duration-300">
                                        <svg class="w-16 h-16 text-blue-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="p-8">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">{{ $service->title }}</h3>
                                    <p class="text-gray-600 leading-relaxed mb-6">{{ $service->excerpt }}</p>
                                    <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700 transition-colors duration-300">
                                        <span>Learn More</span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Services Available</h3>
                        <p class="text-gray-600 text-lg">We're working on adding our services. Please check back soon!</p>
                    </div>
                @endif

                @if($services->hasPages())
                    <div class="mt-16 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-2xl shadow-gray-200 p-4">
                            {{ $services->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-gradient-to-r from-blue-50 to-indigo-50 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23dbeafe" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 to-cyan-600"></div>
                    <div class="relative z-10">
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">Need Custom Healthcare Solutions?</h2>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Our team is ready to discuss your specific healthcare staffing needs and create a tailored solution for your facility or home.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('contact') }}" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Contact Us Today
                            </a>
                            <a href="{{ route('openings.index') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold border-2 border-blue-600 hover:bg-blue-50 transition-colors duration-300 transform hover:-translate-y-1">
                                View Job Openings
                            </a>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-blue-100 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-cyan-100 rounded-full opacity-50"></div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>

