<!DOCTYPE html>
<html lang="en" class="h-full bg-white ">

<head>
    <x-seo::meta />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @seo([
        'title' => 'videngager',
        'description' => 'videngager',
        'image' => asset('images/login-image.png'),
        'site_name' => config('app.name'),
        'favicon' => asset('favicon.ico'),
    ])

    <title>Visiting Angels Admin</title>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="https://unpkg.com/@alpinejs/focus" defer></script> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://upload-widget.cloudinary.com/latest/global/all.js" type="text/javascript"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">



    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

 


    @yield('styles')
    @stack('styles')

    @livewireStyles
</head>

<body class="h-screen font-['Poppins'] ">
    <x-preloader />
    <div id="app" class="h-full  text-gray-700 ">
        <x-notification />
        <x-navbar />
        <x-sidebar />
        
        
        <div id="main-section" class="h-full sm:ml-64 bg-gray-100 pt-20 overflow-y-auto relative flex ">
        {{-- <div id="main-section" class="h-full sm:ml-64 bg-gray-100 pt-20 overflow-y-hidden relative flex "> --}}
            <div>
                <button id="toggle-btn"
                class=" p-2 hidden lg:flex rounded-r-md cursor-pointer bg-black text-white absolute top-5 -left-3 z-40 flex items-center justify-center">
                <i class='bx  bx-sidebar ml-2 text-xl'  ></i> 
            </button>
        </div>
        <div class="flex-grow w-full">
                <x-session-msg />
                {{ $slot }}
            </div>
        
        </div>

    </div>
    

    @yield('scripts')
    @stack('scripts')

    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('refreshPage', () => {
                location.reload();
            });
        });
    </script>

    <script>
        function toggleSidebar() {
            const logoSidebar = document.getElementById('logo-sidebar');
            const mainSection = document.getElementById('main-section');

            logoSidebar.classList.toggle('hidden');
            mainSection.classList.toggle('sm:ml-64');
        }
        // Example usage on a button click
        document.getElementById('toggle-btn').onclick = toggleSidebar;
    </script>

</body>

</html>
