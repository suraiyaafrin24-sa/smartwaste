<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Dashboard - SmartBin</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-100 flex flex-col transition-transform duration-300 transform lg:translate-x-0 lg:static shrink-0 shadow-2xl lg:shadow-none">
            <!-- Brand Logo -->
            <div class="h-16 flex items-center px-6 border-b border-slate-800 bg-slate-950/40">
                <a href="/" class="flex items-center space-x-2.5 group">
                    <div class="w-8.5 h-8.5 bg-emerald-600 rounded-lg flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight"><span class="text-white">Smart</span><span class="text-emerald-505">Bin</span></span>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-grow py-6 px-4 space-y-1.5 overflow-y-auto text-xs font-semibold text-slate-400">
                <div class="pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3">Citizen Dashboard</div>

                <a href="{{ route('user.dashboard') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard Overviews</span>
                </a>

                <a href="{{ route('user.requests.create') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="plus-circle" class="w-4 h-4 text-emerald-500"></i>
                    <span>Schedule Pickup</span>
                </a>

                <a href="{{ route('user.history') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="history" class="w-4 h-4"></i>
                    <span>Pickup History</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3">Subscription</div>

                <a href="{{ route('user.my_subscription') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="credit-card" class="w-4 h-4"></i>
                    <span>Active Plan Details</span>
                </a>

                <a href="{{ route('user.subscription') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="package" class="w-4 h-4"></i>
                    <span>Subscription Plans</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3 border-t border-slate-800/60 mt-4">Utilities</div>

                <a href="{{ route('user.duty_schedule') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Collectors Roster</span>
                </a>

                <a href="{{ route('user.reports.create') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-850 hover:text-white transition-colors">
                    <i data-lucide="alert-triangle" class="w-4 h-4 text-rose-500"></i>
                    <span>Report Concern</span>
                </a>

                <a href="{{ route('user.settings') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>Profile Settings</span>
                </a>
            </nav>

            <!-- Bottom User Details -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/30 flex items-center space-x-3 shrink-0">
                <div class="w-9 h-9 rounded-full bg-emerald-700/20 text-emerald-450 flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold text-slate-200 truncate leading-none">{{ auth()->user()->name }}</p>
                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1 block">Citizen Account</span>
                </div>
            </div>
        </aside>

        <!-- Sidebar overlay for mobile mobile toggle -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-slate-950/60 lg:hidden transition-opacity duration-300"></div>

        <!-- Content Area -->
        <div class="flex-grow flex flex-col h-screen overflow-y-auto">
            
            <!-- Top bar -->
            <header class="h-16 bg-white border-b border-slate-200/80 px-6 flex justify-between items-center shrink-0">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Hamburger -->
                    <button @click="sidebarOpen = !sidebarOpen" class="w-10 h-10 flex items-center justify-center border border-slate-200 rounded-xl hover:bg-slate-50 text-slate-650 lg:hidden transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h2 class="text-lg font-bold text-slate-850 hidden sm:block">Welcome, {{ auth()->user()->name }} 👋</h2>
                </div>
                
                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center space-x-1.5 px-4 py-2 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition-colors shadow-sm">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Dashboard Content Inside Sidebar Frame -->
            <main class="flex-grow p-6 md:p-8 max-w-6xl w-full mx-auto space-y-8">
                
                <!-- Welcome Jumbotron -->
                <div class="bg-gradient-to-r from-emerald-800 to-emerald-950 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-teal-500 rounded-full blur-[100px] opacity-30"></div>
                    <div class="relative z-10 space-y-3 max-w-lg">
                        <span class="px-3 py-1 bg-white/20 text-white text-xs font-bold uppercase tracking-wider rounded-full">Citizen Portal</span>
                        <h2 class="text-3xl font-extrabold tracking-tight">Eco-friendly Waste pickup service</h2>
                        <p class="text-emerald-100 text-sm leading-relaxed">
                            Need a custom collection? Select waste category, scheduling dates, and tracking dispatch statuses in real-time.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-3">
                            <a href="{{ route('user.requests.create') }}" class="inline-flex items-center space-x-2 bg-white hover:bg-slate-50 text-emerald-950 font-bold px-5 py-3 rounded-2xl transition-all shadow-md text-sm">
                                <i data-lucide="plus" class="w-4.5 h-4.5"></i>
                                <span>Book Pick Up Request</span>
                            </a>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-emerald-50 border border-emerald-2e0 text-emerald-800 p-4 rounded-2xl flex items-start space-x-3 shadow-xs">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5 animate-pulse"></i>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Stats Summary -->
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Activity Summary</h3>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-440 font-bold text-xs uppercase tracking-wider">Total Pickups</span>
                            <div class="w-9 h-9 rounded-xl bg-slate-105 flex items-center justify-center text-slate-650"><i data-lucide="trash-2" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900">{{ $stats['total'] }}</h4>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Pending Orders</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600"><i data-lucide="clock" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-amber-600">{{ $stats['pending'] }}</h4>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Completed Route</span>
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600"><i data-lucide="check-square" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-emerald-600">{{ $stats['completed'] }}</h4>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Cancelled</span>
                            <div class="w-9 h-9 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600"><i data-lucide="x-circle" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-rose-600">{{ $stats['cancelled'] }}</h4>
                    </div>
                </div>

                <!-- Recent Collections list -->
                <div class="bg-white border rounded-3xl p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Recent Collection Activity</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Summary logs of your 5 latest collection bookings</p>
                        </div>
                        <a href="{{ route('user.history') }}" class="text-xs font-bold text-emerald-650 hover:text-emerald-705 transition-colors uppercase tracking-wider flex items-center space-x-1">
                            <span>View All Activity</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>

                    @if ($recentRequests->isEmpty())
                        <div class="py-16 text-center space-y-4">
                            <div class="w-16 h-16 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center mx-auto border border-slate-100">
                                <i data-lucide="trash-2" class="w-8 h-8"></i>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-slate-800">No active request logs</h4>
                                <p class="text-slate-505 text-xs max-w-xs mx-auto">You have not scheduled any waste collections yet.</p>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b text-slate-400 text-xs font-bold uppercase tracking-wider">
                                        <th class="pb-3 pt-1">ID</th>
                                        <th class="pb-3 pt-1">Waste Category</th>
                                        <th class="pb-3 pt-1">Target Sector</th>
                                        <th class="pb-3 pt-1">Pickup Date/Time</th>
                                        <th class="pb-3 pt-1">Status</th>
                                        <th class="pb-3 pt-1 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-700">
                                    @foreach ($recentRequests as $req)
                                        <tr>
                                            <td class="py-4 font-mono text-xs text-slate-400">#{{ str_pad($req->id, 5, '0', STR_PAD_LEFT) }}</td>
                                            <td class="py-4 font-bold text-slate-900">{{ $req->waste_type }}</td>
                                            <td class="py-4 font-bold text-slate-800">{{ $req->sector }}</td>
                                            <td class="py-4">
                                                <div class="text-slate-800">{{ $req->scheduled_date }}</div>
                                                <div class="text-[10px] text-slate-400 font-bold uppercase">{{ $req->scheduled_time }}</div>
                                            </td>
                                            <td class="py-4">
                                                @if ($req->status === 'pending')
                                                    <span class="px-2.5 py-1 bg-amber-50 border border-amber-200/50 text-amber-700 text-xs font-bold rounded-full">Pending</span>
                                                @elseif ($req->status === 'assigned')
                                                    <span class="px-2.5 py-1 bg-slate-900 border text-white text-xs font-bold rounded-full">Assigned</span>
                                                @elseif ($req->status === 'completed')
                                                    <span class="px-2.5 py-1 bg-emerald-50 border border-emerald-200/50 text-emerald-700 text-xs font-bold rounded-full">Completed</span>
                                                @else
                                                    <span class="px-2.5 py-1 bg-slate-100 border border-slate-200 text-slate-500 text-xs font-bold rounded-full">Cancelled</span>
                                                @endif
                                            </td>
                                            <td class="py-4 text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    @if ($req->status === 'completed')
                                                        <a href="{{ route('user.receipt', $req->id) }}" target="_blank" class="w-8 h-8 rounded-lg border border-slate-200 hover:bg-slate-50 flex items-center justify-center text-slate-600 transition-colors" title="Print Receipt">
                                                            <i data-lucide="printer" class="w-4 h-4"></i>
                                                        </a>
                                                    @endif
                                                    @if ($req->status === 'pending')
                                                        <form method="POST" action="{{ route('user.requests.cancel', $req->id) }}" onsubmit="return confirm('Do you really want to cancel this booking?')">
                                                            @csrf
                                                            <button type="submit" class="h-8 px-3 rounded-lg border border-rose-100 hover:border-rose-350 text-rose-500 hover:bg-rose-50/50 text-xs font-bold transition-all">
                                                                Cancel
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
