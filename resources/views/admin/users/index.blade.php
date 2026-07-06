<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage System Accounts - SmartBin</title>
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

                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard Overviews</span>
                </a>

                <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
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
                    <button @click="sidebarOpen = !sidebarOpen" class="w-10 h-10 flex items-center justify-center border border-slate-200 rounded-xl hover:bg-slate-50 text-slate-655 lg:hidden transition-colors">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h2 class="text-lg font-bold text-slate-850">System Accounts Database 📝</h2>
                </div>
            </header>

            <!-- Content Inside sidebar frame -->
            <main class="flex-grow p-6 md:p-8 max-w-6xl w-full mx-auto space-y-8">
                
                <!-- Header Actions -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center space-x-1 text-xs font-bold text-slate-500 hover:text-emerald-600 transition-colors uppercase tracking-wider mb-2">
                            <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                            <span>Back to dashboard</span>
                        </a>
                        <h2 class="text-3xl font-black text-slate-900">Manage System Accounts</h2>
                        <p class="text-slate-550 text-sm mt-1">Review active citizen users and assign field collector roles.</p>
                    </div>
                    
                    <div>
                        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center space-x-2 bg-emerald-650 hover:bg-emerald-600 text-white font-bold px-5 py-3 rounded-2xl transition-all shadow-md text-sm">
                            <i data-lucide="user-plus" class="w-4.5 h-4.5"></i>
                            <span>Add New User / Collector</span>
                        </a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-emerald-50 border border-emerald-250 text-emerald-800 p-4 rounded-2xl flex items-start space-x-3 shadow-sm">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-650 shrink-0 mt-0.5 animate-pulse"></i>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-rose-50 border border-rose-250 text-rose-808 p-4 rounded-2xl flex items-start space-x-3 shadow-md">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 shrink-0 mt-0.5"></i>
                        <span class="text-sm font-semibold">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Filter / Search Console -->
                <div class="bg-white border rounded-3xl p-6 shadow-sm">
                    <form method="GET" action="{{ route('admin.users') }}" class="flex flex-col sm:flex-row gap-4 items-center">
                        <div class="relative flex-grow w-full">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="search" class="w-4 h-4"></i>
                            </span>
                            <input type="text" name="search" placeholder="Search by name, email, phone number, sector..." value="{{ $search }}" class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none rounded-2xl text-xs font-semibold text-slate-800 transition-all">
                        </div>
                        <div class="flex gap-2 w-full sm:w-auto">
                            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-slate-900 hover:bg-slate-805 text-white font-bold text-xs rounded-2xl transition-all shadow-sm">
                                Apply Search
                            </button>
                            @if ($search)
                                <a href="{{ route('admin.users') }}" class="px-5 py-3 border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-xs rounded-2xl transition-all text-center flex items-center justify-center">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Users Table -->
                <div class="bg-white border rounded-3xl p-6 shadow-sm overflow-hidden">
                    @if ($users->isEmpty())
                        <div class="py-20 text-center space-y-4">
                            <div class="w-16 h-16 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center mx-auto border border-slate-100">
                                <i data-lucide="users" class="w-8 h-8"></i>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-slate-800">No matching accounts found</h4>
                                <p class="text-slate-550 text-xs max-w-xs mx-auto">Try refining your keyword query or clear search filter filters.</p>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b text-slate-400 text-xs font-bold uppercase tracking-wider">
                                        <th class="pb-3 pt-1">User ID</th>
                                        <th class="pb-3 pt-1">Full Name</th>
                                        <th class="pb-3 pt-1">Email / Contacts</th>
                                        <th class="pb-3 pt-1">Role / Profile</th>
                                        <th class="pb-3 pt-1">Uttara Sector Address</th>
                                        <th class="pb-3 pt-1 text-right">Settings Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm font-semibold text-slate-707">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="py-4 font-mono text-xs text-slate-400">#{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</td>
                                            <td class="py-4 font-bold text-slate-900 leading-tight">
                                                {{ $user->name }}
                                                @if($user->role === 'waste_collector')
                                                    <span class="block text-[10px] text-emerald-650 font-black uppercase tracking-wider mt-0.5">Crew Team</span>
                                                @elseif($user->role === 'user')
                                                    <span class="block text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">Citizen</span>
                                                @endif
                                            </td>
                                            <td class="py-4">
                                                <div class="font-bold text-slate-800 text-xs">{{ $user->email }}</div>
                                                <div class="text-[11px] text-slate-400 font-semibold font-mono mt-0.5">{{ $user->phone ?? 'No contact' }}</div>
                                            </td>
                                            <td class="py-4">
                                                @if ($user->role === 'waste_collector')
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-teal-50 border border-teal-200/50 text-teal-700 text-xs font-bold rounded-full">
                                                        Collector
                                                    </span>
                                                @elseif ($user->role === 'admin')
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-900 text-white text-xs font-bold rounded-full">
                                                        Admin
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-slate-50 border border-slate-205 text-slate-600 text-xs font-bold rounded-full">
                                                        Citizen
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-4 font-medium">
                                                @if ($user->sector)
                                                    <div class="font-bold text-slate-808">{{ $user->sector }}</div>
                                                    <div class="text-xs text-slate-400 max-w-[200px] truncate">{{ $user->address }}</div>
                                                @else
                                                    <span class="text-slate-400 leading-tight block">Not specified</span>
                                                @endif
                                            </td>
                                            <td class="py-4 text-right">
                                                <div class="inline-flex items-center space-x-2">
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-xs border border-slate-200 hover:border-slate-300 text-slate-700 hover:bg-slate-50 font-bold px-3 py-1.5 rounded-xl transition-all">
                                                        Edit
                                                    </a>
                                                    @if($user->id !== auth()->id())
                                                    <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" onsubmit="return confirm('Are you sure you want to terminate this account?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-xs border border-rose-100 hover:border-rose-250 text-rose-500 hover:bg-rose-50/50 font-bold px-3 py-1.5 rounded-xl transition-all">
                                                            Delete
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

                        <!-- Custom Pagination -->
                        <div class="mt-6 pt-4 border-t border-slate-100">
                            {{ $users->appends(['search' => $search])->links() }}
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
