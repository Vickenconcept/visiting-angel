<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <x-seo::meta />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @seo([
        'title' => 'Visiting Angels',
        'description' => 'Home Healthcare Staffing Agency',
        'image' => asset('images/login-image.png'),
        'site_name' => config('app.name'),
        'favicon' => asset('favicon.ico'),
    ])

    <title>Visiting Angels</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    



    @yield('styles')

    @livewireStyles
</head>

<body class="h-full !font-['Poppins']">
    <marquee direction="right" scrollamount="60" class="z-50 fixed w-full hidden" id="hiddenLinearPreloader">
        <div class="bg-gradient-to-r from-gray-800 from-70%  to-indigo-500 w-[700px] p-1 rounded-full"></div>
    </marquee>
    <header class="bg-white shadow-sm sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-1 flex-wrap">
                <a href="/" class="text-2xl font-bold text-black">
                   <div class="w-20 overflow-hidden  border-2 border-orange-400 rounded-full flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Visiting Angels" class="object-cover">
                   </div>
                </a>
                {{-- <a href="/" class="text-2xl font-bold text-black">Visiting Angels</a> --}}
                <div class="flex items-center gap-4">
                    <button id="mobile-nav-toggle" class="md:hidden p-2 text-gray-700 hover:text-orange-500 transition-colors" aria-expanded="false" aria-controls="mobile-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="/" class="text-gray-700 hover:text-orange-500">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-orange-500">About</a>
                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-orange-500">Services</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-orange-500">Blog</a>
                    <a href="{{ route('openings.index') }}" class="text-gray-700 hover:text-orange-500">Jobs</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-orange-500">Contact</a>
                </nav>
                <div id="mobile-nav" class="w-full md:hidden hidden border-t border-gray-200 py-2">
                    <ul class="flex flex-col divide-y divide-gray-100">
                        <li><a href="/" class="block px-2 py-3 text-gray-700 hover:text-orange-500">Home</a></li>
                        <li><a href="{{ route('about') }}" class="block px-2 py-3 text-gray-700 hover:text-orange-500">About</a></li>
                        <li><a href="{{ route('services.index') }}" class="block px-2 py-3 text-gray-700 hover:text-orange-500">Services</a></li>
                        <li><a href="{{ route('blog.index') }}" class="block px-2 py-3 text-gray-700 hover:text-orange-500">Blog</a></li>
                        <li><a href="{{ route('openings.index') }}" class="block px-2 py-3 text-gray-700 hover:text-orange-500">Jobs</a></li>
                        <li><a href="{{ route('contact') }}" class="block px-2 py-3 text-gray-700 hover:text-orange-500">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
            <x-session-msg />
        {{ $slot }}
    </main>

    <footer class="bg-black text-white mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <h3 class="text-xl font-bold">Visiting Angels</h3>
                    <p class="text-gray-400 mt-2">Compassionate care. Professional excellence.</p>
                </div>
                <div>
                    <h4 class="font-semibold">Contact</h4>
                    <p class="text-gray-400 mt-2">Phone: 703 344 0044</p>
                    <p class="text-gray-400">Email: <span class="text-sm">healthcare@Visitingangelshealth.com</span></p>
                    <p class="text-gray-400">Address: 15426  Bevanwood Dr, Woodbridge, VA, 22193-5716</p>
                </div>
                <div>
                    <h4 class="font-semibold">Links</h4>
                    <nav class="flex flex-col gap-2 text-gray-400 mt-2">
                        <a href="{{ route('services.index') }}" class="hover:text-orange-400">Services</a>
                        <a href="{{ route('blog.index') }}" class="hover:text-orange-400">Blog</a>
                        <a href="{{ route('openings.index') }}" class="hover:text-orange-400">Jobs</a>
                        <a href="{{ route('contact') }}" class="hover:text-orange-400">Contact</a>
                    </nav>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-400">
                <p>© {{ date('Y') }} Visiting Angels. All rights reserved.</p>
            </div>
        </div>
</footer>


<script>
    (function() {
        const toggle = document.getElementById('mobile-nav-toggle');
        const panel = document.getElementById('mobile-nav');
        if (toggle && panel) {
            toggle.addEventListener('click', function () {
                const isHidden = panel.classList.contains('hidden');
                panel.classList.toggle('hidden');
                this.setAttribute('aria-expanded', String(isHidden));
                this.innerHTML = isHidden
                    ? '<span class="sr-only">Close navigation</span><i class="fas fa-times text-2xl"></i>'
                    : '<span class="sr-only">Open navigation</span><i class="fas fa-bars text-2xl"></i>';
            });
        }
    })();
</script>

</body>



<script>
    window.addEventListener('beforeunload', function(event) {
        var hiddenText = document.getElementById('hiddenText');
        hiddenText.classList.remove('hidden');
        hiddenLinearPreloader.classList.remove("hidden");
    });

    // document.addEventListener("DOMContentLoaded", function() {
    //         var hiddenLinearPreloader = document.getElementById("hiddenLinearPreloader");

    //         hiddenLinearPreloader.classList.remove("hidden");

    //         setTimeout(function() {
    //             hiddenLinearPreloader.classList.add("hidden");
    //         }, 2000);
    //     });
</script>


@yield('scripts')
@livewireScripts

</html>
