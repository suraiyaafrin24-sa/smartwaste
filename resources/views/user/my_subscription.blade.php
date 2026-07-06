<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Subscription - SmartBin</title>
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
    <main class="flex-grow max-w-lg mx-auto px-4 py-12 w-full space-y-6">
        <div class="bg-white border border-slate-200/60 p-8 rounded-3xl shadow-sm text-center space-y-6">
            <div
                class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                <i data-lucide="shield-check" class="w-10 h-10"></i></div>
            <div class="space-y-1">
                <h3 class="text-2xl font-black text-slate-900">Active Subscription</h3>
                <p class="text-slate-500 text-sm">Citizen Service Plan Status Details</p>
            </div>

            <div class="border-t border-b border-slate-100 py-4 font-semibold text-slate-700 text-sm space-y-3">
                <div class="flex justify-between"><span>Plan Type</span><span
                        class="text-emerald-700 font-bold">SmartBin Free Plan</span></div>
                <div class="flex justify-between"><span>Billing Period</span><span>Monthly</span></div>
                <div class="flex justify-between"><span>Status</span><span
                        class="px-2 py-0.5 bg-emerald-50 text-emerald-600 font-bold border border-emerald-100/50 rounded-full text-xs">Active</span>
                </div>
            </div>

            <a href="{{ route('user.subscription') }}"
                class="block w-full py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-2xl text-center text-sm shadow-md transition-colors">Upgrade
                Plan</a>
        </div>
    </main>
    <footer class="bg-white border-t border-slate-200/80 p-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }}
        SmartBin Systems. All rights reserved.</footer>
    <script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>

</html>