<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-gradient-to-b from-blue-900 via-blue-800 to-indigo-900 shadow-2xl rounded-r-2xl sm:translate-x-0 p-0 border-r border-indigo-200"
    aria-label="Sidebar">
    <div class="h-full flex flex-col rounded-r-2xl overflow-hidden">
        <!-- Branding/Header -->
        <div class="flex items-center justify-between px-5 py-4 bg-gradient-to-r from-blue-800/50 to-indigo-800/50 border-b border-white/10">
            <a href="/home" class="flex items-center text-white">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-3 shadow-lg">
                    <i class='bx bx-plus-medical text-2xl text-white'></i>
                </div>
                <span class="font-bold text-xl tracking-wide">Visiting Angels</span>
            </a>
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-white rounded-lg sm:hidden hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-colors">
                <span class="sr-only">Close sidebar</span>
                <i class='bx bx-x text-2xl'></i>
            </button>
        </div>
        <!-- Navigation -->
        <div class="flex-1 overflow-y-auto py-4 px-2 bg-gradient-to-b from-transparent to-blue-900/20">
            <ul class="font-medium flex flex-col gap-1">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('home') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-grid-alt text-xl {{ request()->routeIs('home') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
           
                {{-- <li>
                    <a href="{{ route('reseller.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('reseller.index') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class='bx bx-store text-xl {{ request()->routeIs('reseller.index') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}'></i>
                        <span>Reseller</span>
                    </a>
                </li> --}}
            </ul>
            <div class="my-4 border-t border-white/10"></div>
            <ul class="font-medium flex flex-col gap-1">
                
                <li>
                    <a href="{{ route('admin.services.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('admin.services.*') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-briefcase text-xl {{ request()->routeIs('admin.services.*') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('admin.blog.*') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-news text-xl {{ request()->routeIs('admin.blog.*') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.openings.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('admin.openings.*') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-briefcase-alt-2 text-xl {{ request()->routeIs('admin.openings.*') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Openings</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('admin.testimonials.*') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-message-rounded-dots text-xl {{ request()->routeIs('admin.testimonials.*') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Testimonials</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.applications.index') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group {{ request()->routeIs('admin.applications.*') ? 'bg-white text-black shadow font-semibold' : 'text-white hover:bg-white/10 hover:text-white' }}">
                        <i class="bx bx-user-check text-xl {{ request()->routeIs('admin.applications.*') ? 'text-black' : 'text-blue-200 group-hover:text-white' }}"></i>
                        <span>Applications</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors group text-red-200 hover:bg-red-500/20 hover:text-red-100">
                        <i class='bx bx-log-out text-xl'></i>
                        <span class="text-sm capitalize">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
