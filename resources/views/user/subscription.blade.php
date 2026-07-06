<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subscription Plans - SmartBin</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between">
    <header class="bg-white border-b border-slate-200/80 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-8">
                    <a href="/" class="flex items-center space-x-2 group">
                        <div
                            class="w-9 h-9 bg-emerald-600 rounded-lg flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5.5 h-5.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <h1 class="text-xl font-bold"><span class="text-slate-900">Smart</span><span
                                class="text-emerald-600">Bin</span></h1>
                    </a>
                    <nav class="hidden md:flex space-x-6 text-sm font-semibold">
                        <a href="{{ route('user.dashboard') }}"
                            class="text-slate-600 hover:text-slate-950 px-1 py-5">Dashboard</a>
                        <a href="{{ route('user.requests.create') }}"
                            class="text-slate-600 hover:text-slate-950 px-1 py-5">Request Collection</a>
                        <a href="{{ route('user.history') }}"
                            class="text-slate-600 hover:text-slate-950 px-1 py-5">History</a>
                    </nav>
                </div>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"
                        class="flex items-center space-x-1.5 px-4 py-2 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-rose-600 transition-colors shadow-sm"><i
                            data-lucide="log-out" class="w-4 h-4"></i><span
                            class="hidden sm:inline">Logout</span></button></form>
            </div>
        </div>
    </header>
    <main class="flex-grow max-w-5xl mx-auto px-4 py-12 w-full text-center space-y-6">
        <h2 class="text-3xl font-black text-slate-900">Subscription Billing Plans</h2>
        <p class="text-slate-500 max-w-md mx-auto">Choose a plan that fits your household load for systematic waste
            collection.</p>

        <div class="grid md:grid-cols-3 gap-8 pt-8">
            <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm space-y-6 text-left">
                <h3 class="text-xl font-extrabold text-slate-900">Basic Eco</h3>
                <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Free Trial</p>
                <p class="text-3xl font-black text-slate-900">$0 <span
                        class="text-xs text-slate-400 font-semibold uppercase">/ month</span></p>
                <ul class="text-sm font-semibold text-slate-600 space-y-2">
                    <li>✓ 2 pickups per month</li>
                    <li>✓ Standard waste categories</li>
                    <li>✗ Emergency pickups</li>
                </ul>
                <button
                    class="w-full py-3 border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold rounded-2xl transition-colors">Select
                    Plan</button>
            </div>

            <div
                class="bg-white border-2 border-emerald-600 p-8 rounded-3xl shadow-lg shadow-emerald-500/5 space-y-6 text-left relative">
                <span
                    class="absolute top-0 right-8 -translate-y-1/2 px-3 py-1 bg-emerald-600 text-white rounded-full text-[10px] font-black uppercase tracking-wider">Recommended</span>
                <h3 class="text-xl font-extrabold text-slate-900">Premium Citizen</h3>
                <p class="text-emerald-600 text-xs font-black uppercase tracking-wider">Best Value</p>
                <p class="text-3xl font-black text-slate-900">$15 <span
                        class="text-xs text-slate-400 font-semibold uppercase">/ month</span></p>
                <ul class="text-sm font-semibold text-slate-600 space-y-2">
                    <li>✓ Unlimited pickups</li>
                    <li>✓ All waste categories</li>
                    <li>✓ 2 Emergency requests</li>
                    <li>✓ Live status tracking</li>
                </ul>
                <button
                    class="w-full py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-2xl transition-all shadow-md">Subscribe
                    Now</button>
            </div>

            <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm space-y-6 text-left">
                <h3 class="text-xl font-extrabold text-slate-900">Enterprise Residential</h3>
                <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Apartment Buildings</p>
                <p class="text-3xl font-black text-slate-900">$49 <span
                        class="text-xs text-slate-400 font-semibold uppercase">/ month</span></p>
                <ul class="text-sm font-semibold text-slate-600 space-y-2">
                    <li>✓ Multi-family residential support</li>
                    <li>✓ Daily waste clearing</li>
                    <li>✓ Unlimited emergency dispatches</li>
                    <li>✓ Dedicated collector crew</li>
                </ul>
                <button
                    class="w-full py-3 border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold rounded-2xl transition-colors">Select
                    Plan</button>
            </div>
        </div>
    </main>
    <footer class="bg-white border-t border-slate-200/80 p-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }}
        SmartBin Systems. All rights reserved.</footer>
    <script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>

</html>