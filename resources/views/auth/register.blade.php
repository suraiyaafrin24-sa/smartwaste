<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Citizen Account - EcoClean</title>

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
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between relative overflow-hidden" x-data="{ registered: false, citizenName: '' }">
    
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
            <a href="/login" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition-colors flex items-center space-x-1.5">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Sign In Page</span>
            </a>
        </div>
    </header>

    <!-- Main registration card -->
    <main class="flex-grow flex items-center justify-center p-4">
        <!-- Form Container -->
        <div x-show="!registered" class="bg-white rounded-3xl max-w-lg w-full p-8 shadow-2xl border border-slate-200/50 relative">
            <!-- Header section -->
            <div class="text-center space-y-2 mb-6">
                <h1 class="text-3xl font-extrabold text-slate-900">Citizen Registration</h1>
                <p class="text-slate-500 text-sm">Join EcoClean to start submitting waste collection requests.</p>
            </div>

            <!-- Staff Warning Notice Box -->
            <div class="p-4 bg-amber-50 rounded-2xl mb-6 text-xs text-amber-900 border border-amber-200/50">
                <div class="flex items-start space-x-2">
                    <i data-lucide="shield-alert" class="w-4.5 h-4.5 text-amber-600 shrink-0 mt-0.5"></i>
                    <div class="space-y-1">
                        <strong class="font-bold">Staff Notice:</strong>
                        <p>Self-registration is only available for <strong>Citizens</strong>.</p>
                        <p class="text-[11px] text-amber-800">
                            • <strong>Collectors:</strong> Ask your System Administrator to create your credentials.<br>
                            • <strong>Admins:</strong> Please log in using pre-configured system credentials.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form @submit.prevent="registered = true" class="space-y-4">
                <!-- Dual inputs: Name & Phone -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">Full Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </span>
                            <input type="text" x-model="citizenName" required placeholder="John Doe" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">Phone Number</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </span>
                            <input type="tel" required placeholder="+1 (555) 000-0000" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 pointer-events-none">
                            <i data-lucide="mail" class="w-4.5 h-4.5"></i>
                        </span>
                        <input type="email" required placeholder="name@example.com" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1.5">Home Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 pt-3 text-slate-400 pointer-events-none">
                            <i data-lucide="map-pin" class="w-4.5 h-4.5"></i>
                        </span>
                        <textarea required rows="2" placeholder="Enter your home address for waste collection" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all"></textarea>
                    </div>
                </div>

                <!-- Passwords -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">Password</label>
                        <input type="password" required placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1.5">Confirm Password</label>
                        <input type="password" required placeholder="••••••••" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-4 mt-6 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-2xl shadow-md hover:from-emerald-600 hover:to-teal-700 hover:shadow-xl hover:shadow-emerald-100 transition-all duration-300 flex items-center justify-center space-x-2">
                    <span>Register Citizen Account</span>
                    <i data-lucide="user-plus" class="w-4 h-4"></i>
                </button>

                <!-- Navigation link -->
                <div class="text-center text-xs font-medium text-slate-500 mt-6 border-t border-slate-100 pt-4">
                    Already have a citizen account? <a href="/login" class="text-emerald-600 font-bold hover:underline">Sign In</a>
                </div>
            </form>
        </div>

        <!-- Success Container -->
        <div x-show="registered" style="display: none;" class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-slate-200/50 text-center space-y-6">
            <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                <i data-lucide="check" class="w-10 h-10"></i>
            </div>
            
            <div class="space-y-2">
                <h2 class="text-2xl font-bold text-slate-900">Registration Complete!</h2>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Welcome to EcoClean, <strong class="text-slate-800" x-text="citizenName"></strong>! Your account has been registered successfully.
                </p>
            </div>

            <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-xs text-emerald-800 text-left leading-relaxed">
                🎉 You can now log in to schedule pickups, track collection status, and earn points for segregating waste.
            </div>

            <a href="/login" class="block w-full py-3.5 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 transition-colors text-center text-sm">
                Proceed to Sign In
            </a>
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
