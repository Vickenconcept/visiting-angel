<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visiting Angels Home Healthcare Inc.</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-white text-gray-800 font-['Poppins']">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-black">Visiting Angels</a>
                </div>

                <!-- Social Media & CTA -->
                <div class="flex items-center space-x-4">
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-600 hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-orange-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <a href="{{ route('contact') }}" class="va-btn">Contact Us</a>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="border-t border-gray-200 py-4">
                <ul class="flex space-x-8 justify-center">
                    <li><a href="/" class="text-gray-600 hover:text-orange-400 transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}"
                            class="text-gray-600 hover:text-orange-400 transition-colors">About</a></li>
                    <li><a href="{{ route('services.index') }}"
                            class="text-gray-600 hover:text-orange-400 transition-colors">Services</a></li>
                    <li><a href="{{ route('blog.index') }}"
                            class="text-gray-600 hover:text-orange-400 transition-colors">Blog</a></li>
                    <li><a href="{{ route('openings.index') }}"
                            class="text-gray-600 hover:text-orange-400 transition-colors">Jobs</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-gray-600 hover:text-orange-400 transition-colors">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <div
        style="background-image: url('https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=1974&auto=format&fit=crop'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <section id="hero" class="relative bg-gradient-to-l from-black to-gray-900/80 text-white py-20 overflow-hidden">
            <!-- Floating elements -->
            <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-16 h-16 bg-orange-300/20 rounded-full animate-bounce"></div>
            <div class="absolute top-1/2 right-20 w-12 h-12 bg-white/5 rounded-full animate-ping"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="mb-8">
                            <div class="inline-block px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                                <span class="text-orange-200 font-semibold text-lg">Trusted Healthcare Partner</span>
                            </div>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 hero-anim">
                            Welcome to <span class="text-orange-300 bg-gradient-to-r from-orange-300 to-yellow-300 bg-clip-text text-transparent">Visiting Angels</span> Home Healthcare Inc.
                        </h1>
                        <p class="text-lg md:text-xl text-gray-300 mb-4 hero-anim">Where compassionate care meets professional
                            excellence.</p>
                        <p class="text-gray-300 mb-4 hero-anim">We believe that behind every staffing request is a story: a family
                            wanting peace of mind, or a facility in need of trusted hands. Our mission is simple yet
                            powerful: to bring dignity, respect, and skilled care into every environment we serve.</p>
                        <p class="text-gray-300 mb-8 hero-anim">From Certified Nursing Assistants (CNAs) to Licensed Practical Nurses (LPNs), our team is more than just staff—they are caregivers who treat your loved ones and residents as if they were their own family. Whether it's assisting with daily living, administering medications, or offering companionship, Visiting Angels is here to lighten the load and lift spirits. </p>
                        <div class="flex flex-col sm:flex-row gap-4 hero-anim">
                            <a href="{{ route('services.index') }}" class="bg-orange-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Explore Services
                            </a>
                            <a href="{{ route('contact') }}"
                                class="bg-transparent border-2 border-orange-500 text-orange-500 px-8 py-4 rounded-xl font-semibold hover:bg-orange-500 hover:text-white transition-all duration-300 backdrop-blur-sm">
                                Contact Us
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="bg-gray-800/40 rounded-lg overflow-hidden h-[60dvh] flex items-center justify-center hero-image-anim relative group">
                            <img src="https://media.istockphoto.com/id/1662781116/photo/portrait-of-happy-woman-surgeon-standing-in-operating-room-ready-to-work-on-a-patient-female.jpg?s=612x612&w=0&k=20&c=cprEoLa7cpVIIZpVhXsh8lcdZ-_-hpKStGFmuitdomY="
                                alt="Caregiving" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <main class="bg-white ">
        <!-- Why Choose Us -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f3f4f6" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-orange-100 text-orange-800 rounded-full text-sm font-semibold mb-4">
                        Our Promise
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Why Partner With Us</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">We go beyond filling shifts. We build relationships, create
                        continuity of care, and ensure that both facilities and families can count on us 24/7.</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-yellow-500 mx-auto rounded-full mt-6"></div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden reveal-up">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-orange-600 group-hover:text-orange-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-xl text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300">Thoroughly Screened Caregivers</h3>
                            <p class="text-gray-600 leading-relaxed">Competence and compassion are non‑negotiable.</p>
                        </div>
                    </div>
                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden reveal-up">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-orange-600 group-hover:text-orange-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-xl text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300">Always Available</h3>
                            <p class="text-gray-600 leading-relaxed">Day, night, weekends, and holidays.</p>
                        </div>
                    </div>
                    <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden reveal-up">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                                <svg class="w-8 h-8 text-orange-600 group-hover:text-orange-700 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-xl text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300">Tailored Solutions</h3>
                            <p class="text-gray-600 leading-relaxed">No one‑size‑fits‑all placements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- About Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="relative reveal-up">
                        <div class="bg-gray-200 rounded-lg overflow-hidden h-96 flex items-center justify-center">
                            <img src="https://media.istockphoto.com/id/1200806397/photo/team-of-healthcare-worker-in-hospital.jpg?s=612x612&w=0&k=20&c=OQR399oLdwGVvPQMcGEUjTuWDDmzKdpM1U20u8LwxoQ="
                                class="w-full h-full object-cover" alt="Caregiver with senior">
                        </div>
                    </div>
                    <div class="reveal-up">
                        <h2 class="text-4xl font-bold mb-6">Compassionate Care, Reliable Staffing</h2>
                        <p class="text-gray-600 mb-6">We connect facilities and families with qualified caregivers —
                            CNAs, CMTs, GNAs, LPNs, and PNs — who bring skill, compassion, and professionalism to every
                            shift. Our promise is peace of mind and continuity of care.</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Thorough screening & background checks</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>CPR/First‑Aid trained, competency‑verified</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Flexible coverage 24/7, weekends & holidays</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Continuity of care and reliable attendance</span>
                            </li>
                        </ul>
                        <a href="{{ route('services.index') }}"
                            class="inline-block bg-orange text-orange-500 hover:text-white border-2 border-orange-500 px-6 py-3 rounded-md hover:bg-orange-500 transition duration-500 ease-in-out">Explore
                            Services</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section 2 -->
        <section class="py-20 bg-black text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="mb-8">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-heart text-orange-400 text-3xl mr-3"></i>
                                <span class="text-4xl font-semibold">Your Partner in Care</span>
                            </div>
                            <p class="text-gray-300">We support administrators and families with dependable, people‑first
                                staffing. From medication support to memory care, our caregivers uplift residents with
                                dignity and respect.</p>
                        </div>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Compassion at the center of every interaction</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Medication assistance (CMT/LPN) and health monitoring</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Dementia & fall‑prevention training</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-orange-400 mr-3"></i>
                                <span>Respect for dignity and independence</span>
                            </li>
                        </ul>
                        <a href="{{ route('contact') }}"
                            class="inline-block bg-orange text-orange-500 hover:text-white border-2 border-orange-500 px-6 py-3 rounded-md hover:bg-orange-500 transition duration-500 ease-in-out">Talk
                            to Us</a>
                    </div>
                    <div class="relative reveal-up">
                        <div class="bg-gray-200 rounded-lg overflow-hidden h-96 flex items-center justify-center">
                            <img src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?q=80&w=1974&auto=format&fit=crop"
                                class="w-full h-full object-cover" alt="Nurse with patient">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Preview -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f3f4f6" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-orange-100 text-orange-800 rounded-full text-sm font-semibold mb-4">
                        What We Offer
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Our Services</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional healthcare staffing solutions tailored to your specific needs</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-yellow-500 mx-auto rounded-full mt-6"></div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative reveal-up">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                @if ($service->image_url)
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                        <div class="absolute top-4 left-4">
                                            <span class="bg-white/90 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">
                                                Service
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-orange-100 to-yellow-200 flex items-center justify-center group-hover:from-orange-200 group-hover:to-yellow-300 transition-all duration-300">
                                        <svg class="w-16 h-16 text-orange-400 group-hover:text-orange-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="p-6">
                                    <h3 class="font-bold text-xl text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300">{{ $service->title }}</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($service->body ?? ''), 120) }}</p>
                                    <div class="flex items-center text-orange-600 font-semibold group-hover:text-orange-700 transition-colors duration-300">
                                        <span>Learn More</span>
                                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-3 text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Services Coming Soon</h3>
                            <p class="text-gray-600 text-lg">We're working on adding our services. Please check back soon!</p>
                        </div>
                    @endforelse
                </div>
                @if($services->count() > 0)
                    <div class="text-center mt-12">
                        <a href="{{ route('services.index') }}" class="bg-orange-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-orange-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            View All Services
                        </a>
                    </div>
                @endif
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f3f4f6" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-orange-100 text-orange-800 rounded-full text-sm font-semibold mb-4">
                        Client Stories
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Testimonials</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Families and facilities trust us for dependable, compassionate staffing. Here's what they're saying.</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-orange-500 to-yellow-500 mx-auto rounded-full mt-6"></div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php($testimonials = \App\Models\Testimonial::query()->where('is_published', true)->latest()->take(6)->get())
                    @forelse($testimonials as $t)
                        <div class="group bg-white rounded-2xl shadow-2xl shadow-gray-200 p-8 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 relative overflow-hidden reveal-up">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="relative z-10">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                                    <svg class="w-6 h-6 text-orange-600 group-hover:text-orange-700 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-700 text-center mb-6 leading-relaxed">"{{ $t->quote }}"</p>
                                <div class="flex items-center justify-center gap-4">
                                    @if($t->image_url)
                                    <img src="{{ $t->image_url }}" alt="{{ $t->name }}" class="w-12 h-12 rounded-full object-cover">
                                    @else
                                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                        <span class="text-orange-600 font-semibold text-lg">{{ substr($t->name, 0, 1) }}</span>
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        <p class="font-bold text-gray-900">{{ $t->name }}</p>
                                        @if($t->role)
                                        <p class="text-gray-500 text-sm">{{ $t->role }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Testimonials Coming Soon</h3>
                            <p class="text-gray-600 text-lg">We're collecting testimonials from our satisfied clients. Check back soon!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-black text-white py-16" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Visiting Angels</h3>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="text-gray-400 text-sm">© 2024 Visiting Angels. All Rights Reserved.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Contact Us</h4>
                    <div class="space-y-2 text-gray-400">
                        <p>15426 Bevanwood Dr, Woodbridge, VA, 22193-5716</p>
                        <p>301 395 7085</p>
                        <p>healthcare@Visitingangelshealth.com</p>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('services.index') }}"
                                class="hover:text-orange-400 transition-colors">Services</a></li>
                        <li><a href="{{ route('blog.index') }}"
                                class="hover:text-orange-400 transition-colors">Blog</a></li>
                        <li><a href="{{ route('openings.index') }}"
                                class="hover:text-orange-400 transition-colors">Jobs</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="hover:text-orange-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-orange-400 transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-orange-400 transition-colors">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>Copyright 2024 Visiting Angels. All Rights Reserved. | Privacy Policy | Terms & Conditions
                </p>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        // Hero entrance
        gsap.from('.hero-anim', {
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power2.out',
            delay: 0.2
        });
        gsap.from('.hero-image-anim', {
            x: 40,
            opacity: 0,
            duration: 1,
            ease: 'power2.out',
            delay: 0.3
        });

        // Scroll reveals for cards/sections
        gsap.registerPlugin(ScrollTrigger);
        document.querySelectorAll('.reveal-up').forEach((el) => {
            gsap.from(el, {
                y: 40,
                opacity: 0,
                duration: 0.7,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
    </script>
</body>

</html>
