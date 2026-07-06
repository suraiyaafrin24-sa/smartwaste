<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Settings - SmartBin Admin</title>
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

<body class="bg-slate-50 text-slate-805 min-h-screen flex flex-col justify-between">
    <header class="bg-slate-900 text-white sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex items-center space-x-8">
                <a href="/" class="flex items-center space-x-2 group">
                    <div
                        class="w-9 h-9 bg-emerald-600 rounded-lg flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-5.5 h-5.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold"><span class="text-white">Smart</span><span
                            class="text-emerald-500">Bin</span></h1>
                </a>
                <nav class="hidden md:flex space-x-6 text-sm font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-350 hover:text-white">Dashboard</a>
                    <a href="{{ route('admin.users') }}" class="text-slate-350 hover:text-white">Users & Collectors</a>
                </nav>
            </div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"
                    class="text-slate-300 hover:text-rose-455 font-bold text-sm">Logout</button></form>
        </div>
    </header>
    <main class="flex-grow max-w-4xl w-full mx-auto px-4 py-8 space-y-6">
        <h2 class="text-3xl font-black text-slate-900 border-b pb-4">Profile Settings</h2>
        <div class="bg-white border rounded-3xl p-8 shadow-sm text-center py-16 space-y-4">
            <div
                class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                <i data-lucide="user" class="w-8 h-8"></i></div>
            <h3 class="text-xl font-bold text-slate-900">Manage Administrator Credentials</h3>
            <p class="text-slate-500 text-sm max-w-sm mx-auto">Update your dashboard credentials, notifications
                preferences, and security passwords.</p>
        </div>
    </main>
    <footer class="bg-white border-t p-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }} SmartBin Systems.
        All rights reserved.</footer>
    <script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>

</html>