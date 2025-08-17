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
        <section id="hero" class="bg-gradient-to-l from-black to-gray-900/80 text-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 hero-anim">Welcome to Visiting Angels Home Healthcare Inc.
                        </h1>
                        <p class="text-lg md:text-xl text-gray-300 mb-4 hero-anim">Where compassionate care meets professional
                            excellence.</p>
                        <p class="text-gray-300 mb-4 hero-anim">We believe that behind every staffing request is a story: a family
                            wanting peace of mind, or a facility in need of trusted hands. Our mission is simple yet
                            powerful: to bring dignity, respect, and skilled care into every environment we serve.</p>
                        <p class="text-gray-300 mb-8 hero-anim">From Certified Nursing Assistants (CNAs) to Licensed Practical Nurses (LPNs), our team is more than just staff—they are caregivers who treat your loved ones and residents as if they were their own family. Whether it’s assisting with daily living, administering medications, or offering companionship, Visiting Angels is here to lighten the load and lift spirits. </p>
                        <div class="flex gap-4 hero-anim">
                            <a href="{{ route('services.index') }}" class="va-btn">Explore Services</a>
                            <a href="{{ route('contact') }}"
                                class="bg-transparent border-2 border-orange-500 text-orange-500 px-5 py-2 rounded-lg hover:bg-orange-500 hover:text-white transition">Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="bg-gray-800/40 rounded-lg overflow-hidden h-[60dvh] flex items-center justify-center hero-image-anim">
                            <img src="https://media.istockphoto.com/id/1662781116/photo/portrait-of-happy-woman-surgeon-standing-in-operating-room-ready-to-work-on-a-patient-female.jpg?s=612x612&w=0&k=20&c=cprEoLa7cpVIIZpVhXsh8lcdZ-_-hpKStGFmuitdomY="
                                alt="Caregiving" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <main class="bg-white ">
        <!-- Why Choose Us -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-black">Why Partner With Us</h2>
                <p class="text-gray-700 mt-3 max-w-3xl">We go beyond filling shifts. We build relationships, create
                    continuity of care, and ensure that both facilities and families can count on us 24/7.</p>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class="va-card p-6 reveal-up">
                        <h3 class="font-semibold text-lg text-black">Thoroughly Screened Caregivers</h3>
                        <p class="text-gray-600 mt-2">Competence and compassion are non‑negotiable.</p>
                    </div>
                    <div class="va-card p-6 reveal-up">
                        <h3 class="font-semibold text-lg text-black">Always Available</h3>
                        <p class="text-gray-600 mt-2">Day, night, weekends, and holidays.</p>
                    </div>
                    <div class="va-card p-6 reveal-up">
                        <h3 class="font-semibold text-lg text-black">Tailored Solutions</h3>
                        <p class="text-gray-600 mt-2">No one‑size‑fits‑all placements.</p>
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
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=1974&auto=format&fit=crop"
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
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-6">
                    <h2 class="text-3xl font-bold text-black">Our Services</h2>
                    <a href="{{ route('services.index') }}" class="va-link">View all</a>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="block bg-white border rounded-xl overflow-hidden hover:shadow-lg transition reveal-up">
                            @if ($service->image_url)
                                <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                    class="w-full h-48 object-cover">
                            @endif
                            <div class="p-5">
                                <h3 class="font-semibold text-lg text-black">{{ $service->title }}</h3>
                                <p class="text-gray-600 mt-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($service->body ?? ''), 160) }}</p>
                                <span class="inline-block mt-3 text-orange-500">Read more →</span>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-600">Services will appear here soon.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-black text-center">Testimonials</h2>
                <p class="text-gray-700 mt-3 mb-10 text-center max-w-3xl mx-auto">Families and facilities trust us for dependable, compassionate staffing. Here’s what they’re saying.</p>
                <div class="grid md:grid-cols-3 gap-6">
                    @php($testimonials = \App\Models\Testimonial::query()->where('is_published', true)->latest()->take(6)->get())
                    @forelse($testimonials as $t)
                        <div class="va-card p-6 reveal-up">
                            <p class="text-gray-700">“{{ $t->quote }}”</p>
                            <div class="mt-4 flex items-center gap-3">
                                @if($t->image_url)
                                <img src="{{ $t->image_url }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover">
                                @endif
                                <div>
                                    <p class="font-semibold text-black">{{ $t->name }}</p>
                                    @if($t->role)
                                    <p class="text-gray-500 text-sm">{{ $t->role }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 text-center col-span-3">Testimonials will appear here soon.</p>
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
