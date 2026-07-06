<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection Duty Schedule - SmartBin</title>
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
                            class="text-slate-600 hover:text-slate-955 px-1 py-5">Dashboard</a>
                        <a href="{{ route('user.requests.create') }}"
                            class="text-slate-600 hover:text-slate-955 px-1 py-5">Request Collection</a>
                        <a href="{{ route('user.history') }}"
                            class="text-slate-600 hover:text-slate-955 px-1 py-5">History</a>
                    </nav>
                </div>
                <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"
                        class="flex items-center space-x-1.5 px-4 py-2 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 hover:text-rose-600 transition-colors shadow-sm"><i
                            data-lucide="log-out" class="w-4 h-4"></i><span
                            class="hidden sm:inline">Logout</span></button></form>
            </div>
        </div>
    </header>
    <main class="flex-grow max-w-[1400px] w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center space-y-6">
        <h2 class="text-3xl font-black text-slate-900">Zone Duty Schedule & Collector Route Listings</h2>
        <p class="text-slate-500 max-w-md mx-auto">Reference the weekly assigned collectors schedule for waste zoning
            sectors in Uttara.</p>

        <div
            class="bg-white border border-slate-200/60 rounded-3xl p-6 shadow-sm overflow-hidden text-left max-w-4xl mx-auto">
            <table class="w-full text-sm font-semibold text-slate-700">
                <thead>
                    <tr class="border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="pb-3 pt-1">Uttara Sector</th>
                        <th class="pb-3 pt-1">Collector Team</th>
                        <th class="pb-3 pt-1">Duty Day</th>
                        <th class="pb-3 pt-1">Time Slot</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr>
                        <td class="py-4">Sector 1 - 4</td>
                        <td class="py-4 text-emerald-650">Team Alpha (Joe D., Sam P.)</td>
                        <td class="py-4">Mon, Wed, Fri</td>
                        <td class="py-4">8:00 AM - 12:00 PM</td>
                    </tr>
                    <tr>
                        <td class="py-4">Sector 5 - 8</td>
                        <td class="py-4 text-emerald-650">Team Beta (Rudy K., Liam N.)</td>
                        <td class="py-4">Tue, Thu, Sat</td>
                        <td class="py-4">1:00 PM - 5:00 PM</td>
                    </tr>
                    <tr>
                        <td class="py-4">Sector 9 - 12</td>
                        <td class="py-4 text-emerald-650">Team Gamma (Rick Z., Frank M.)</td>
                        <td class="py-4">Mon, Thu, Sat</td>
                        <td class="py-4">8:00 AM - 12:00 PM</td>
                    </tr>
                    <tr>
                        <td class="py-4">Sector 13 - 18</td>
                        <td class="py-4 text-emerald-650">Team Delta (Alex W., Toby H.)</td>
                        <td class="py-4">Tue, Fri, Sun</td>
                        <td class="py-4">6:00 PM - 9:00 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer class="bg-white border-t border-slate-200/80 p-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }}
        SmartBin Systems. All rights reserved.</footer>
    <script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>

</html>