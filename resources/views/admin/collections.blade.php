<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collections Log - SmartBin Admin</title>
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
                    class="text-slate-300 hover:text-rose-400 font-bold text-sm">Logout</button></form>
        </div>
    </header>
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 py-8 space-y-6">
        <h2 class="text-3xl font-black text-slate-900">Zoning Dispatch Logs & Assignments</h2>
        <p class="text-slate-500">Query and assign active collector crews to pending resident requests.</p>

        <div class="bg-white border rounded-3xl p-6 shadow-sm overflow-hidden">
            <table class="w-full text-left text-sm font-semibold text-slate-700">
                <thead>
                    <tr class="border-b text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="pb-3">ID</th>
                        <th class="pb-3">Type</th>
                        <th class="pb-3">Sector</th>
                        <th class="pb-3">Created By</th>
                        <th class="pb-3">Collector Staff</th>
                        <th class="pb-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    @foreach($collections as $c)
                        <tr>
                            <td class="py-4 font-mono text-xs text-slate-400">#{{ $c->id }}</td>
                            <td class="py-4">{{ $c->waste_type }}</td>
                            <td class="py-4 font-bold">{{ $c->sector }}</td>
                            <td class="py-4">{{ $c->user->name }}</td>
                            <td class="py-4">
                                @if($c->collector)
                                    <span class="text-emerald-600">{{ $c->collector->name }}</span>
                                @else
                                    <span class="text-slate-450 italic">None</span>
                                @endif
                            </td>
                            <td class="py-4">
                                <span
                                    class="px-2 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700">{{ $c->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-4 border-t mt-4">{{ $collections->links() }}</div>
        </div>
    </main>
    <footer class="bg-white border-t p-6 text-center text-xs text-slate-400">&copy; {{ date('Y') }} SmartBin Systems.
        All rights reserved.</footer>
    <script>document.addEventListener('DOMContentLoaded', () => lucide.createIcons());</script>
</body>

</html>