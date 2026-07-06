<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collector Control Panel - SmartBin</title>
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
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Collector Console</span>
                </a>

                <a href="{{ route('waste_collector.history') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
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
                    <i data-lucide="mail" class="w-4 h-4 text-rose-450"></i>
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
                    <h2 class="text-lg font-bold text-slate-850">Collector Console 🚛</h2>
                </div>

                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center space-x-1.5 px-4 py-2 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors shadow-sm">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content Inside sidebar frame -->
            <main class="flex-grow p-6 md:p-8 max-w-6xl w-full mx-auto space-y-8">

                <!-- Welcome Jumbotron -->
                <div
                    class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div
                        class="absolute -right-10 -bottom-10 w-48 h-48 bg-emerald-500 rounded-full blur-[100px] opacity-20">
                    </div>
                    <div class="relative z-10 space-y-3 max-w-xl">
                        <span
                            class="px-3 py-1 bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-wider rounded-full">Collector
                            Crew Console</span>
                        <h2 class="text-3xl font-extrabold tracking-tight">Active Duty:
                            {{ $collector->sector ?? 'No Sector Assigned' }}</h2>
                        <p class="text-slate-350 text-sm leading-relaxed">
                            Review and complete assigned collection orders. You can also self-assign pending requests
                            submitted by residents in your sector.
                        </p>
                    </div>
                </div>

                @if (session('success'))
                    <div
                        class="bg-emerald-50 border border-emerald-200 text-emerald-808 p-4 rounded-2xl flex items-start space-x-3 shadow-sm">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-605 shrink-0 mt-0.5 animate-pulse"></i>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Stats Section -->
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Shifts & Tasks
                    Overview</h3>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-440 font-bold text-xs uppercase tracking-wider">Assigned
                                Sector</span>
                            <div
                                class="w-9 h-9 rounded-xl bg-slate-105 flex items-center justify-center text-slate-650">
                                <i data-lucide="map" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-2xl font-black text-slate-900">{{ $collector->sector ?? 'Unassigned' }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Primary zoning jurisdiction</p>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-440 font-bold text-xs uppercase tracking-wider">Pending in
                                Sector</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                                <i data-lucide="clock" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-2xl font-black text-amber-600">{{ $stats['sector_pending'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Available for self-assigning</p>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-440 font-bold text-xs uppercase tracking-wider">Active
                                Assignments</span>
                            <div
                                class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                                <i data-lucide="truck" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-2xl font-black text-emerald-600">{{ $stats['assigned'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Jobs on route</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Left: Active assignments (8 cols) -->
                    <div class="lg:col-span-7 bg-white border rounded-3xl p-6 shadow-sm">
                        <h3 class="text-md font-bold text-slate-900 mb-6 flex items-center space-x-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-550 animate-ping"></span>
                            <span>Your Active Collections ({{ $activeTasks->count() }})</span>
                        </h3>

                        @if ($activeTasks->isEmpty())
                            <div class="py-16 text-center space-y-3">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-50 text-slate-400 flex items-center justify-center mx-auto">
                                    <i data-lucide="inbox" class="w-6 h-6"></i></div>
                                <h4 class="font-bold text-slate-800 text-sm">No active tasks</h4>
                                <p class="text-slate-400 text-xs max-w-xs mx-auto">Select a pending pickup from your sector
                                    list on the right to start routes.</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($activeTasks as $task)
                                    <div
                                        class="p-5 border border-slate-100 rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:border-slate-205 transition-all">
                                        <div class="space-y-1">
                                            <div class="flex items-center space-x-2">
                                                <span
                                                    class="text-xs font-mono text-slate-440">#{{ str_pad($task->id, 5, '0', STR_PAD_LEFT) }}</span>
                                                <span
                                                    class="px-2 py-0.5 bg-slate-900 text-white rounded text-[10px] font-black uppercase tracking-wider font-mono">{{ $task->waste_type }}</span>
                                            </div>
                                            <h4 class="font-extrabold text-slate-900 text-sm mt-1">Citizen:
                                                {{ $task->user->name }}</h4>
                                            <p class="text-xs text-slate-500 font-medium">Pickup: {{ $task->scheduled_date }} at
                                                {{ $task->scheduled_time }}</p>
                                            <p class="text-xs text-slate-850 font-bold block pt-1 flex items-center space-x-1">
                                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-emerald-600"></i>
                                                <span>{{ $task->address }}</span>
                                            </p>
                                            @if($task->notes)
                                                <p class="text-[11px] text-slate-400 italic">"{{ $task->notes }}"</p>
                                            @endif
                                        </div>
                                        <div class="w-full sm:w-auto shrink-0 select-none">
                                            <form method="POST"
                                                action="{{ route('waste_collector.requests.complete', $task->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full py-2.5 px-4 bg-emerald-650 hover:bg-emerald-600 text-white font-bold rounded-xl transition-all shadow-md text-xs flex items-center justify-center space-x-1">
                                                    <i data-lucide="check" class="w-4 h-4"></i>
                                                    <span>Mark Completed</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Right: Pending sector tasks to pick up (5 cols) -->
                    <div class="lg:col-span-5 bg-white border rounded-3xl p-6 shadow-sm">
                        <h3 class="text-md font-bold text-slate-905 mb-6 flex items-center space-x-2">
                            <i data-lucide="clipboard-list" class="w-5 h-5 text-amber-500"></i>
                            <span>Available in {{ $collector->sector ?? 'Sector' }}
                                ({{ $availableRequests->count() }})</span>
                        </h3>

                        @if ($availableRequests->isEmpty())
                            <div class="py-16 text-center space-y-3">
                                <div
                                    class="w-12 h-12 rounded-xl bg-slate-50 text-slate-450 flex items-center justify-center mx-auto">
                                    <i data-lucide="smile" class="w-6 h-6"></i></div>
                                <h4 class="font-bold text-slate-800 text-sm">Zone is completely clean!</h4>
                                <p class="text-slate-400 text-xs max-w-xs mx-auto">No pending collection requests are
                                    outstanding in your assigned sector.</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($availableRequests as $req)
                                    <div
                                        class="p-4 border border-slate-100 rounded-2xl space-y-3 bg-slate-50/50 hover:border-slate-200 transition-all font-semibold">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <span
                                                    class="text-xs font-mono text-slate-455">#{{ str_pad($req->id, 5, '0', STR_PAD_LEFT) }}</span>
                                                <h4 class="font-extrabold text-slate-900 text-sm mt-0.5">{{ $req->waste_type }}
                                                </h4>
                                            </div>
                                            @if($req->weight)
                                                <span
                                                    class="text-[11px] font-mono font-bold bg-slate-200/60 text-slate-650 px-2 py-0.5 rounded-md">{{ $req->weight }}
                                                    kg</span>
                                            @endif
                                        </div>
                                        <div class="text-xs space-y-1 text-slate-600 leading-normal font-medium">
                                            <div class="flex items-center space-x-1.5">
                                                <i data-lucide="user" class="w-3.5 h-3.5 text-slate-440"></i>
                                                <span>{{ $req->user->name }}</span>
                                            </div>
                                            <div class="flex items-center space-x-1.5 font-semibold">
                                                <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-440"></i>
                                                <span>{{ $req->scheduled_date }} ({{ $req->scheduled_time }})</span>
                                            </div>
                                            <div class="flex items-start space-x-1.5 pt-1">
                                                <i data-lucide="map-pin"
                                                    class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5"></i>
                                                <span class="text-slate-800">{{ $req->address }}</span>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <form method="POST"
                                                action="{{ route('waste_collector.requests.accept', $req->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full py-2 bg-slate-905 hover:bg-slate-800 text-white font-bold text-xs rounded-xl shadow transition-colors flex items-center justify-center space-x-1">
                                                    <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i>
                                                    <span>Assign to Me</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
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