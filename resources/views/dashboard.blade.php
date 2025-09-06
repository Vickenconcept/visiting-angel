<x-app-layout>
    <!-- Hero Section -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Header -->
        <section class="relative overflow-hidden bg-gradient-to-r from-blue-900 to-indigo-900">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="relative max-w-7xl mx-auto px-4 py-16">
                <div class="text-center text-white">
                    <div class="mb-6">
                        <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                            <span class="text-blue-200 font-semibold text-lg">Admin Dashboard</span>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                        Welcome to <span class="text-blue-300 bg-gradient-to-r from-blue-300 to-cyan-300 bg-clip-text text-transparent">Visiting Angels</span> Dashboard
                    </h1>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8">
                        Manage your healthcare staffing operations with our comprehensive admin panel
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-300 to-cyan-300 mx-auto rounded-full"></div>
                    <!-- Floating elements -->
                    <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                    <div class="absolute bottom-20 right-10 w-16 h-16 bg-blue-300/20 rounded-full animate-bounce"></div>
                </div>
            </div>
        </section>

        <!-- Dashboard Content -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4">
                <!-- Quick Stats -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-cyan-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-blue-600 group-hover:text-blue-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">{{ \App\Models\OpeningApplication::where('status', 'hired')->count() }}</div>
                                <p class="text-gray-600 font-medium">Hired Staff</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-emerald-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-green-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-green-600 group-hover:text-green-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors duration-300">{{ \App\Models\Opening::where('is_active', true)->count() }}</div>
                                <p class="text-gray-600 font-medium">Job Openings</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-purple-600 group-hover:text-purple-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-300">{{ \App\Models\Service::count() }}</div>
                                <p class="text-gray-600 font-medium">Services</p>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-orange-600 group-hover:text-orange-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors duration-300">{{ \App\Models\BlogPost::where('is_published', true)->count() }}</div>
                                <p class="text-gray-600 font-medium">Blog Posts</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 p-8 md:p-12 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-600 to-cyan-600"></div>
                    <div class="relative z-10">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Quick Actions</h2>
                            <p class="text-xl text-gray-600">Manage your healthcare staffing operations efficiently</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <a href="{{ route('openings.index') }}" class="group bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 hover:from-blue-100 hover:to-cyan-100 transition-all duration-300 hover:-translate-y-1 border border-blue-200">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Manage Jobs</h3>
                                </div>
                                <p class="text-gray-600 text-sm">Create and manage job openings</p>
                            </a>

                            <a href="{{ route('services.index') }}" class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 hover:from-green-100 hover:to-emerald-100 transition-all duration-300 hover:-translate-y-1 border border-green-200">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-600 transition-colors duration-300">Manage Services</h3>
                                </div>
                                <p class="text-gray-600 text-sm">Add and edit healthcare services</p>
                            </a>

                            <a href="{{ route('blog.index') }}" class="group bg-gradient-to-br from-purple-50 to-indigo-50 rounded-2xl p-6 hover:from-purple-100 hover:to-indigo-100 transition-all duration-300 hover:-translate-y-1 border border-purple-200">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-200 transition-colors duration-300">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Manage Blog</h3>
                                </div>
                                <p class="text-gray-600 text-sm">Create and manage blog posts</p>
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
</x-app-layout>