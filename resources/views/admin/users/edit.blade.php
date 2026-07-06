<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit System Account - SmartBin</title>
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

<body class="bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false, userRole: '{{ old('role', $user->role) }}' }">

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
                <div class="pb-2 text-[10px] font-black uppercase text-slate-655 tracking-wider px-3">Management</div>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard Overviews</span>
                </a>

                <a href="{{ route('admin.users') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl bg-emerald-600/10 text-emerald-400 font-bold border border-emerald-500/10 transition-colors">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>Accounts & Rosters</span>
                </a>

                <a href="{{ route('admin.collections') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="truck" class="w-4 h-4"></i>
                    <span>Duty Assignments</span>
                </a>

                <div class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3">
                    Administration</div>

                <a href="{{ route('admin.duty_roster') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    <span>Manage Dispatch Roster</span>
                </a>

                <a href="{{ route('admin.reports') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="bar-chart-2" class="w-4 h-4"></i>
                    <span>Analytical Reports</span>
                </a>

                <a href="{{ route('admin.complaints') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                    <span>Complaints Board</span>
                </a>

                <a href="{{ route('admin.leave_requests') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="mail-open" class="w-4 h-4"></i>
                    <span>Crew Leaves</span>
                </a>

                <a href="{{ route('admin.payments') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-850 hover:text-white transition-colors">
                    <i data-lucide="dollar-sign" class="w-4 h-4 text-emerald-500"></i>
                    <span>Payments Ledger</span>
                </a>

                <div
                    class="pt-4 pb-2 text-[10px] font-black uppercase text-slate-600 tracking-wider px-3 border-t border-slate-800/60 mt-4">
                    Settings</div>

                <a href="{{ route('admin.settings') }}"
                    class="flex items-center space-x-3 px-3 py-3 rounded-xl hover:bg-slate-805 hover:text-white transition-colors">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    <span>System Settings</span>
                </a>
            </nav>

            <!-- Bottom User Details -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/30 flex items-center space-x-3 shrink-0">
                <div
                    class="w-9 h-9 rounded-full bg-emerald-700/20 text-emerald-450 flex items-center justify-center font-bold">
                    A
                </div>
                <div class="flex-grow min-w-0">
                    <p class="text-xs font-bold text-slate-200 truncate leading-none">System Admin</p>
                    <span
                        class="text-[10px] text-slate-500 font-bold uppercase tracking-wider mt-1 block">{{ auth()->user()->email }}</span>
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
                    <h2 class="text-lg font-bold text-slate-850">Edit User Account</h2>
                </div>
            </header>

            <!-- Content Inside sidebar frame -->
            <main class="flex-grow p-6 md:p-8 max-w-3xl w-full mx-auto space-y-8">

                <div class="mb-4">
                    <a href="{{ route('admin.users') }}"
                        class="inline-flex items-center space-x-1 text-xs font-bold text-slate-500 hover:text-emerald-650 transition-colors uppercase tracking-wider mb-2">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                        <span>Back to Listings</span>
                    </a>
                    <h2 class="text-3xl font-black text-slate-900">Modify Account Profile</h2>
                    <p class="text-slate-550 text-sm mt-1">Configure profile, phone number, and Uttara sectors mapping
                        for: <strong class="text-slate-900 font-bold">{{ $user->name }}</strong></p>
                </div>

                <!-- Form Card -->
                <div class="bg-white border rounded-3xl p-8 shadow-sm">
                    @if ($errors->any())
                        <div class="bg-rose-50 border border-rose-200 text-rose-808 p-4 rounded-2xl mb-6 space-y-1">
                            <div class="flex items-center space-x-2 font-bold text-sm">
                                <i data-lucide="alert-circle" class="w-4.5 h-4.5 text-rose-650"></i>
                                <span>Validation errors found:</span>
                            </div>
                            <ul class="list-disc list-inside text-xs font-semibold pl-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Dropdown: Select Account type role -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-705 mb-2 flex items-center space-x-2">
                                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                                <span>Role Type</span>
                            </label>
                            <select name="role" required x-model="userRole"
                                class="w-full px-4 py-3.5 rounded-xl border border-slate-205 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all bg-slate-50 font-semibold cursor-pointer">
                                <option value="user">Citizen / General User</option>
                                <option value="waste_collector">Waste Collector Crew</option>
                            </select>
                        </div>

                        <!-- Input Name & Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Full name</label>
                                <input type="text" name="name" required value="{{ old('name', $user->name) }}"
                                    placeholder="John Doe"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-505 focus:border-emerald-500 outline-none text-slate-800 text-sm font-semibold transition-all bg-slate-50">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                                <input type="email" name="email" required value="{{ old('email', $user->email) }}"
                                    placeholder="example@smartbin.com"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-505 focus:border-emerald-505 outline-none text-slate-800 text-sm font-semibold transition-all bg-slate-50">
                            </div>
                        </div>

                        <!-- Input Password & Phone -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Account Password <span
                                        class="text-slate-400 font-normal">(Leave blank to keep current)</span></label>
                                <input type="password" name="password" placeholder="Enter new password"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-850 text-sm font-semibold transition-all bg-slate-50">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Phone Number</label>
                                <input type="text" name="phone" required value="{{ old('phone', $user->phone) }}"
                                    placeholder="e.g. 01712345678"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-505 outline-none text-slate-805 text-sm font-semibold transition-all bg-slate-50">
                            </div>
                        </div>

                        <!-- Address fields -->
                        <div class="space-y-6 pt-4 border-t border-slate-100">
                            <h3 class="text-sm font-bold text-slate-900">Uttara Service Logistics</h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 mb-2 flex items-center space-x-2">
                                        <i data-lucide="map" class="w-4 h-4 text-emerald-600"></i>
                                        <span
                                            x-text="userRole === 'user' ? 'Citizen Sector' : 'Zoned Collector Sector'"></span>
                                    </label>
                                    <select name="sector"
                                        class="w-full px-4 py-3.5 rounded-xl border border-slate-220 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-slate-800 text-sm transition-all bg-slate-50 font-semibold cursor-pointer">
                                        <option value="" disabled>Select Sector zone</option>
                                        @foreach($sectors as $sec)
                                            <option value="{{ $sec }}" {{ old('sector', $user->sector) == $sec ? 'selected' : '' }}>{{ $sec }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 mb-2 flex items-center space-x-2">
                                        <i data-lucide="navigation" class="w-4 h-4 text-emerald-600"></i>
                                        <span>Road/House Detail</span>
                                    </label>
                                    <input type="text" name="road" placeholder="e.g. Road 12"
                                        value="{{ old('road', $user->road) }}"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-505 focus:border-emerald-500 outline-none text-slate-808 text-sm font-semibold transition-all bg-slate-50">
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-semibold text-slate-705 mb-2 flex items-center space-x-2">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-emerald-600"></i>
                                    <span>Complete address</span>
                                </label>
                                <textarea name="address" rows="2" placeholder="Floor No, Flat details, Landmarks etc."
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-505 outline-none text-slate-808 text-sm font-semibold transition-all bg-slate-50">{{ old('address', $user->address) }}</textarea>
                            </div>
                        </div>

                        <!-- Submit buttons -->
                        <div class="pt-6 border-t border-slate-100 flex items-center justify-end space-x-4">
                            <a href="{{ route('admin.users') }}"
                                class="px-5 py-3 border border-slate-200 hover:bg-slate-50 rounded-2xl text-slate-700 font-bold transition-all text-sm">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-8 py-3 bg-emerald-600 hover:bg-emerald-555 text-white font-bold rounded-2xl transition-all shadow-md text-sm">
                                Save Modifications
                            </button>
                        </div>
                    </form>
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