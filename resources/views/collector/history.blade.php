<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Completed Pickups History - SmartBin</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

<body class="bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-100 flex flex-col transition-transform duration-300 transform lg:translate-x-0 lg:static shrink-0 shadow-2xl lg:shadow-none">
            <!-- Brand Logo -->
            <div class="h-16 flex items-center px-6 border-b border-slate-800 bg-slate-950/40">
                <a href="/" class="flex items-center space-x-2.5 group">
                    <div
                        class="w-8.5 h-8.5 bg-emerald-600 rounded-lg flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight"><span class="text-white">Smart</span><span
                            class="text-emerald-505">Bin</span></span>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-grow py-6 px-4 space-y-1.5 overflow-y-auto text-xs font-semibold text-slate-400">
                <div class="pb-2 text-[10px] font-black uppercase text-slate-655 tracking-wider px-3">Collector Duty
                </div>

                <a href="{{ route('waste_collector.dashboard') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Collector Console</span>
                </a>

                <a href="{{ route('waste_collector.history') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
                    <i data-lucide="check-square" class="w-4 h-4 text-emerald-500"></i>
                    <span>Completed Pickups</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3">Rosters</div>

                <a href="{{ route('waste_collector.duty_schedule') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Shift Schedules</span>
                </a>

                <a href="{{ route('waste_collector.payment_collection') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                    <span>Collect Payments</span>
                </a>

                <a href="{{ route('waste_collector.leave_requests') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="mail shadow" class="w-4 h-4 text-rose-450"></i>
                    <span>Request Leave</span>
                </a>

                <a href="{{ route('waste_collector.settings') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors border-t border-slate-800/80 pt-4 mt-4">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Crew Settings</span>
                </a>
            </nav>

            <!-- Bottom User Details -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/30 flex items-center space-x-3 shrink-0">
                <div
                    class="w-9 h-9 rounded-full bg-emerald-700/20 text-emerald-450 flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold text-slate-200 truncate leading-none">{{ auth()->user()->name }}</p>
                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1 block">Zoning
                        Staff</span>
                </div>
            </div>
        </aside>

        <!-- Sidebar overlay for mobile mobile toggle -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden transition-opacity duration-300"></div>

        <!-- Content Area -->
        <div class="flex-grow flex flex-col h-screen overflow-y-auto">

            <!-- Top bar -->
            <header class="h-16 bg-white border-b border-slate-200/80 px-6 flex justify-between items-center shrink-0">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="w-10 h-10 flex items-center justify-center border border-slate-200 rounded-xl hover:bg-slate-50 text-slate-655 lg:hidden transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h2 class="text-lg font-bold text-slate-850">History Logs 🚛</h2>
                </div>
            </header>

            <!-- Content Inside sidebar frame -->
            <main class="flex-grow p-6 md:p-8 max-w-6xl w-full mx-auto space-y-8">

                <!-- Title info -->
                <div class="mb-8">
                    <a href="{{ route('waste_collector.dashboard') }}"
                        class="inline-flex items-center space-x-1 text-xs font-bold text-slate-500 hover:text-emerald-650 transition-colors uppercase tracking-wider mb-2">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                        <span>Back to Dashboard</span>
                    </a>
                    <h2 class="text-3xl font-black text-slate-900">Completed Collection Logs</h2>
                    <p class="text-slate-550 text-sm mt-1">Review table timeline of all historic waste requests cleared
                        by you.</p>
                </div>

                <!-- History Table -->
                <div class="bg-white border rounded-3xl p-6 shadow-sm overflow-hidden animate-fadeIn">
                    @if ($completedRequests->isEmpty())
                        <div class="py-20 text-center space-y-4">
                            <div
                                class="w-16 h-16 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center mx-auto border border-slate-100">
                                <i data-lucide="check-square" class="w-8 h-8"></i>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-slate-800">No completed jobs yet</h4>
                                <p class="text-slate-505 text-xs max-w-xs mx-auto">When you complete active assigned
                                    requests, they'll show up in this history report log.</p>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b text-slate-400 text-xs font-bold uppercase tracking-wider">
                                        <th class="pb-3 pt-1">Request ID</th>
                                        <th class="pb-3 pt-1">Citizen Name</th>
                                        <th class="pb-3 pt-1">Waste Type</th>
                                        <th class="pb-3 pt-1">Zoning/Address</th>
                                        <th class="pb-3 pt-1">Scheduled Details</th>
                                        <th class="pb-3 pt-1">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-705">
                                    @foreach ($completedRequests as $req)
                                        <tr>
                                            <td class="py-4 font-mono text-xs text-slate-400">
                                                #{{ str_pad($req->id, 5, '0', STR_PAD_LEFT) }}</td>
                                            <td class="py-4 font-bold text-slate-900 leading-tight">
                                                {{ $req->user->name }}
                                                <div class="text-[11px] text-slate-400 font-semibold font-mono mt-0.5">
                                                    {{ $req->user->phone }}</div>
                                            </td>
                                            <td class="py-4">
                                                <div class="font-bold text-slate-900">{{ $req->waste_type }}</div>
                                                @if($req->weight)
                                                    <span class="text-xs text-slate-404 font-medium font-mono">Weight:
                                                        {{ $req->weight }} kg</span>
                                                @endif
                                            </td>
                                            <td class="py-4 font-medium">
                                                <div class="font-bold text-slate-808">{{ $req->sector }}</div>
                                                <div class="text-xs text-slate-400 max-w-[200px] truncate">{{ $req->address }}
                                                </div>
                                            </td>
                                            <td class="py-4 font-medium">
                                                <div class="text-slate-808 text-xs font-bold">{{ $req->scheduled_date }}</div>
                                                <div class="text-[11px] text-slate-400 font-semibold font-mono mt-0.5">
                                                    {{ $req->scheduled_time }}</div>
                                            </td>
                                            <td class="py-4">
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 border border-emerald-2e0 text-emerald-700 text-xs font-bold rounded-full">
                                                    Completed
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Custom Pagination -->
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            {{ $completedRequests->links() }}
                        </div>
                    @endif
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-slate-200/80 p-6 text-center text-xs text-slate-400 mt-auto">
                &copy; {{ date('Y') }} SmartBin Systems. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>