<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Console - SmartBin</title>
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
                <div class="pb-2 text-[10px] font-black uppercase text-slate-650 tracking-wider px-3">Management</div>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard Overviews</span>
                </a>

                <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Accounts & Rosters</span>
                </a>

                <a href="{{ route('admin.collections') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="truck" class="w-4 h-4"></i>
                    <span>Duty Assignments</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3">Administration</div>

                <a href="{{ route('admin.duty_roster') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Manage Dispatch Roster</span>
                </a>

                <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                    <span>Analytical Reports</span>
                </a>

                <a href="{{ route('admin.complaints') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                    <span>Complaints Board</span>
                </a>

                <a href="{{ route('admin.leave_requests') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="mail-open" class="w-4 h-4"></i>
                    <span>Crew Leaves</span>
                </a>

                <a href="{{ route('admin.payments') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-850 hover:text-white transition-colors">
                    <i data-lucide="dollar-sign" class="w-4 h-4 text-emerald-500"></i>
                    <span>Payments Ledger</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3 border-t border-slate-800/60 mt-4">Settings</div>

                <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>System Settings</span>
                </a>
            </nav>

            <!-- Bottom User Details -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/30 flex items-center space-x-3 shrink-0">
                <div class="w-9 h-9 rounded-full bg-emerald-700/20 text-emerald-450 flex items-center justify-center font-bold">
                    A
                </div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold text-slate-200 truncate leading-none">System Admin</p>
                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1 block">{{ auth()->user()->email }}</span>
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
                    <button @click="sidebarOpen = !sidebarOpen" class="w-10 h-10 flex items-center justify-center border border-slate-200 rounded-xl hover:bg-slate-50 text-slate-650 lg:hidden transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h2 class="text-lg font-bold text-slate-850">Uttara Control Center 🖥️</h2>
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

            <!-- Content Inside sidebar frame -->
            <main class="flex-grow p-6 md:p-8 max-w-6xl w-full mx-auto space-y-8">
                
                <!-- Welcome Jumbotron -->
                <div class="bg-gradient-to-r from-emerald-800 to-emerald-950 rounded-3xl p-8 text-white relative overflow-hidden shadow-xl">
                    <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-teal-500 rounded-full blur-[100px] opacity-30"></div>
                    <div class="relative z-10 space-y-3 max-w-xl">
                        <span class="px-3 py-1 bg-white/20 text-white text-xs font-bold uppercase tracking-wider rounded-full">Administrator Portal</span>
                        <h2 class="text-3xl font-extrabold tracking-tight font-serif">Uttara SmartBin Command Center</h2>
                        <p class="text-emerald-100 text-sm leading-relaxed">
                            Create and edit collector crews, register citizens, track active collection orders, and monitor pickup timelines across all target sectors.
                        </p>
                        <div class="pt-2 flex flex-wrap gap-3">
                            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center space-x-2 bg-slate-900 hover:bg-slate-855 text-white font-bold px-5 py-3 rounded-2xl transition-all shadow-md text-sm">
                                <i data-lucide="user-plus" class="w-4.5 h-4.5"></i>
                                <span>Register User / Collector</span>
                            </a>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl flex items-start space-x-3 shadow-sm">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-650 shrink-0 mt-0.5 animate-pulse"></i>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-rose-50 border border-rose-200 text-rose-800 p-4 rounded-2xl flex items-start space-x-3 shadow-md">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 shrink-0 mt-0.5"></i>
                        <span class="text-sm font-semibold">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Stats Section -->
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Command Overview</h3>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Total Citizens</span>
                            <div class="w-9 h-9 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600"><i data-lucide="users" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900">{{ $stats['total_users'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Registered residents</p>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Collector Crews</span>
                            <div class="w-9 h-9 rounded-xl bg-teal-50 flex items-center justify-center text-teal-650"><i data-lucide="truck" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-teal-650">{{ $stats['total_collectors'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Field staff members</p>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Pending Orders</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600"><i data-lucide="clock" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-amber-600">{{ $stats['pending_pickups'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Awaiting dispatching</p>
                    </div>

                    <div class="bg-white border p-6 rounded-3xl shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-400 font-bold text-xs uppercase tracking-wider">Completed pickups</span>
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600"><i data-lucide="check-square" class="w-5 h-5"></i></div>
                        </div>
                        <h4 class="text-3xl font-black text-emerald-600">{{ $stats['completed_pickups'] }}</h4>
                        <p class="text-xs text-slate-500 mt-1">Successfully cleared</p>
                    </div>
                </div>

                <!-- Recent Logs table -->
                <div class="bg-white border rounded-3xl p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Recent Collection Activity</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Overview of the last 5 scheduled collections</p>
                        </div>
                        <a href="{{ route('admin.collections') }}" class="text-xs font-bold text-emerald-650 hover:text-emerald-705 transition-colors uppercase tracking-wider flex items-center space-x-1">
                            <span>Manage Dispatch Log</span>
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
                                <p class="text-slate-500 text-xs max-w-xs mx-auto">No waste requests have been booked in the system database yet.</p>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b text-slate-400 text-xs font-bold uppercase tracking-wider">
                                        <th class="pb-3 pt-1">ID</th>
                                        <th class="pb-3 pt-1">Citizen Info</th>
                                        <th class="pb-3 pt-1">Waste Type</th>
                                        <th class="pb-3 pt-1">Zoning/Address</th>
                                        <th class="pb-3 pt-1">Collector Crew</th>
                                        <th class="pb-3 pt-1">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-705">
                                    @foreach ($recentRequests as $req)
                                        <tr>
                                            <td class="py-4 font-mono text-xs text-slate-400">#{{ str_pad($req->id, 5, '0', STR_PAD_LEFT) }}</td>
                                            <td class="py-4">
                                                <div class="font-bold text-slate-900">{{ $req->user->name }}</div>
                                                <div class="text-xs text-slate-400 font-medium">{{ $req->user->phone }}</div>
                                            </td>
                                            <td class="py-4">
                                                <div class="font-bold text-slate-900">{{ $req->waste_type }}</div>
                                                @if($req->weight)
                                                    <span class="text-xs text-slate-400 font-medium font-mono">Weight: {{ $req->weight }} kg</span>
                                                @endif
                                            </td>
                                            <td class="py-4">
                                                <div class="font-bold text-slate-808">{{ $req->sector }}</div>
                                                <div class="text-xs text-slate-400 max-w-[200px] truncate font-medium">{{ $req->address }}</div>
                                            </td>
                                            <td class="py-4 font-semibold">
                                                @if ($req->collector)
                                                    <span class="text-emerald-700 font-bold">{{ $req->collector->name }}</span>
                                                @else
                                                    <span class="text-slate-400 font-normal">Unassigned</span>
                                                @endif
                                            </td>
                                            <td class="py-4">
                                                @if ($req->status === 'pending')
                                                    <span class="px-2.5 py-1 bg-amber-50 border border-amber-200/50 text-amber-700 text-xs font-bold rounded-full">Pending</span>
                                                @elseif ($req->status === 'assigned')
                                                    <span class="px-2.5 py-1 bg-sky-50 border border-sky-200/50 text-sky-700 text-xs font-bold rounded-full">Assigned</span>
                                                @elseif ($req->status === 'completed')
                                                    <span class="px-2.5 py-1 bg-emerald-50 border border-emerald-200/50 text-emerald-700 text-xs font-bold rounded-full">Completed</span>
                                                @else
                                                    <span class="px-2.5 py-1 bg-slate-100 border border-slate-203 text-slate-600 text-xs font-bold rounded-full">Cancelled</span>
                                                @endif
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
