<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In - EcoClean</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between relative overflow-hidden" x-data="{ selectedRole: (new URLSearchParams(window.location.search)).get('role') || 'citizen' }">
    
    <!-- Background decorative gradients -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-100 rounded-full blur-3xl opacity-60 pointer-events-none -z-10"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-teal-100 rounded-full blur-3xl opacity-50 pointer-events-none -z-10"></div>

    <!-- Header -->
    <header class="p-6">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center space-x-2 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white shadow-md shadow-emerald-200 group-hover:scale-105 transition-transform duration-300">
                    <i data-lucide="recycle" class="w-6 h-6"></i>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-teal-700 bg-clip-text text-transparent">EcoClean</span>
            </a>
            <a href="/" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition-colors flex items-center space-x-1.5">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </header>

    <!-- Main login card -->
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-200/50 relative">
            <!-- Header section -->
            <div class="text-center space-y-2 mb-8">
                <h1 class="text-3xl font-extrabold text-slate-900">Welcome Back</h1>
                <p class="text-slate-500 text-sm">Please sign in to access your dashboard.</p>
            </div>

            <!-- Role Tabs Selector -->
            <div class="bg-slate-100 p-1.5 rounded-2xl flex mb-6 border border-slate-200/30">
                <button type="button" @click="selectedRole = 'citizen'"
                        :class="selectedRole === 'citizen' ? 'bg-white text-emerald-700 shadow-sm' : 'text-slate-600 hover:text-slate-950'"
                        class="flex-1 py-2.5 text-xs sm:text-sm font-bold rounded-xl transition-all flex items-center justify-center space-x-1.5">
                    <i data-lucide="user" class="w-4 h-4"></i>
                    <span>Citizen</span>
                </button>
                <button type="button" @click="selectedRole = 'collector'"
                        :class="selectedRole === 'collector' ? 'bg-white text-teal-700 shadow-sm' : 'text-slate-600 hover:text-slate-950'"
                        class="flex-1 py-2.5 text-xs sm:text-sm font-bold rounded-xl transition-all flex items-center justify-center space-x-1.5">
                    <i data-lucide="truck" class="w-4 h-4"></i>
                    <span>Collector</span>
                </button>
                <button type="button" @click="selectedRole = 'admin'"
                        :class="selectedRole === 'admin' ? 'bg-white text-slate-950 shadow-sm' : 'text-slate-600 hover:text-slate-950'"
                        class="flex-1 py-2.5 text-xs sm:text-sm font-bold rounded-xl transition-all flex items-center justify-center space-x-1.5">
                    <i data-lucide="shield" class="w-4 h-4"></i>
                    <span>Admin</span>
                </button>
            </div>

            <!-- Context Helper message -->
            <div class="p-4 rounded-2xl mb-6 text-xs transition-all duration-300"
                 :class="{
                     'bg-emerald-50 text-emerald-800 border border-emerald-100/50': selectedRole === 'citizen',
                     'bg-teal-50 text-teal-800 border border-teal-100/50': selectedRole === 'collector',
                     'bg-slate-50 text-slate-800 border border-slate-200/50': selectedRole === 'admin'
                 }">
                <div class="flex items-start space-x-2">
                    <i data-lucide="info" class="w-4 h-4 shrink-0 mt-0.5"
                       :class="{
                           'text-emerald-600': selectedRole === 'citizen',
                           'text-teal-600': selectedRole === 'collector',
                           'text-slate-700': selectedRole === 'admin'
                       }"></i>
                    <div>
                        <!-- Citizen Helper -->
                        <span x-show="selectedRole === 'citizen'">
                            Sign in to schedule pickups, track collectors, and check your eco-points.
                        </span>
                        <!-- Collector Helper -->
                        <span x-show="selectedRole === 'collector'">
                            Access route maps and view daily pickup lists. <strong>Note:</strong> Registration is disabled here. Accounts are registered by the Administrator.
                        </span>
                        <!-- Admin Helper -->
                        <span x-show="selectedRole === 'admin'">
                            Sign in with system credentials to access live maps, operations log, and user creation forms.
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form @submit.prevent="alert('Demo Mode: Authenticated successfully as ' + selectedRole + '!')" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i data-lucide="mail" class="w-4.5 h-4.5"></i>
                        </span>
                        <input type="email" required placeholder="name@example.com" class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i data-lucide="lock" class="w-4.5 h-4.5"></i>
                        </span>
                        <input type="password" required placeholder="••••••••" class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs font-semibold text-slate-500 pt-1">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span>Remember Me</span>
                    </label>
                    <a href="#" class="hover:text-emerald-600 transition-colors">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-4 mt-6 text-white font-bold rounded-2xl shadow-md transition-all duration-300 flex items-center justify-center space-x-2"
                        :class="{
                            'bg-emerald-600 hover:bg-emerald-700 hover:shadow-emerald-200': selectedRole === 'citizen',
                            'bg-teal-600 hover:bg-teal-700 hover:shadow-teal-200': selectedRole === 'collector',
                            'bg-slate-900 hover:bg-slate-800 hover:shadow-slate-200': selectedRole === 'admin'
                        }">
                    <span>Log In</span>
                    <i data-lucide="log-in" class="w-4 h-4"></i>
                </button>

                <!-- Navigation link (just for Citizen) -->
                <div x-show="selectedRole === 'citizen'" class="text-center text-xs font-medium text-slate-500 mt-6 border-t border-slate-100 pt-4">
                    Don't have a citizen account? <a href="/register" class="text-emerald-600 font-bold hover:underline">Register Now</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="p-6 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} EcoClean Systems. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
</body>
</html>
