@seo([
    'title' => 'Visiting Angels - Login',
    'description' => 'Sign in to your Visiting Angels healthcare management account',
    'image' => asset('images/login-image.png'),
    'site_name' => config('app.name'),
    'favicon' => asset('images/fav-image.png'),
])
<x-guest-layout>
    <!-- Hero Background -->
    <div class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-blue-300/20 rounded-full animate-bounce"></div>
        <div class="absolute top-1/2 right-20 w-12 h-12 bg-white/5 rounded-full animate-ping"></div>
        
        <div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative z-10">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <!-- Logo -->
                <div class="flex justify-center mb-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-2xl shadow-blue-500/25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </div>
                </div>
                
                <!-- Header -->
                <div class="text-center">
                    <div class="inline-block px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
                        <span class="text-blue-200 font-semibold text-sm">Healthcare Management</span>
                    </div>
                    <h2 class="text-4xl font-bold text-white mb-4">
                        Welcome Back
                    </h2>
                    <p class="text-blue-100 text-lg">
                        Sign in to your Visiting Angels account
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-300 to-cyan-300 mx-auto rounded-full mt-6"></div>
                </div>
                
                <x-session-msg />
            </div>
    
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl shadow-2xl shadow-blue-500/25 p-8 md:p-10 border border-white/20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-cyan-500"></div>
                    <div class="relative z-10">
                        <form class="space-y-6" action="{{ route('auth.login') }}" method="post">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-semibold text-white mb-2">
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" autocomplete="email" required 
                                        class="block w-full pl-10 pr-3 py-3 border border-white/30 rounded-xl bg-white/10 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                                        placeholder="Enter your email">
                                </div>
                            </div>
        
                            <div>
                                <label for="password" class="block text-sm font-semibold text-white mb-2">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input type="password" id="password" name="password" required
                                        class="block w-full pl-10 pr-12 py-3 border border-white/30 rounded-xl bg-white/10 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300"
                                        placeholder="Enter your password">
                                    <button type="button" onclick="showPassword()"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-blue-300 hover:text-white transition-colors duration-300">
                                        <i class="bx bx-show-alt text-xl" id="show"></i>
                                        <i class="bx bx-hide text-xl" id="hide" style="display: none"></i>
                                    </button>
                                </div>
                            </div>
        
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox" 
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-white/30 rounded bg-white/10">
                                    <label for="remember-me" class="ml-2 block text-sm text-white">
                                        Remember me
                                    </label>
                                </div>
        
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-blue-300 hover:text-white transition-colors duration-300">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>
        
                            <div>
                                <button type="submit" 
                                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                    <span>
                                        <span id="hiddenText" class="hidden">
                                            <i class='bx bx-loader-alt animate-spin mr-2'></i>
                                        </span>
                                        <span>Sign In</span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-white/10 rounded-full opacity-50"></div>
                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-blue-300/20 rounded-full opacity-50"></div>
                </div>
            </div>
        </div>
    </div>
    

     <script>
         function showPassword() {
             var passwordField = document.getElementById('password');
             var show = document.getElementById('show');
             var hide = document.getElementById('hide');
             if (passwordField.type === 'password') {
                 passwordField.type = 'text';
                 show.style.display = 'none'
                 hide.style.display = 'block'
             } else {
                 passwordField.type = 'password';
                 show.style.display = 'block'
                 hide.style.display = 'none'
             }
         }
     </script>
 </x-guest-layout>
