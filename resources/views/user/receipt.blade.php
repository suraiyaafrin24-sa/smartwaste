<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt #{{ str_pad($wasteRequest->id, 5, '0', STR_PAD_LEFT) }} - SmartBin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
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

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white;
                color: black;
            }

            .print-card {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen py-12 px-4 sm:px-6">

    <div class="max-w-2xl mx-auto">
        <!-- Back and Print actions -->
        <div class="no-print mb-6 flex justify-between items-center">
            <a href="{{ route('user.dashboard') }}"
                class="inline-flex items-center space-x-1 text-xs font-bold text-slate-500 hover:text-emerald-600 transition-colors uppercase tracking-wider">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Back to Dashboard</span>
            </a>

            <button onclick="window.print()"
                class="inline-flex items-center space-x-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-4 py-2.5 rounded-xl transition-all shadow-md text-xs">
                <i data-lucide="printer" class="w-4 h-4"></i>
                <span>Print Receipt</span>
            </button>
        </div>

        <!-- Receipt Card -->
        <div class="print-card bg-white border border-slate-200/60 rounded-3xl p-8 sm:p-12 shadow-md space-y-8">
            <!-- Receipt Header -->
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-slate-100 pb-8 gap-4">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-700 bg-clip-text text-transparent">SmartBin
                        Systems</span>
                </div>
                <div class="text-left sm:text-right">
                    <h2 class="text-xs font-black text-slate-400 uppercase tracking-widest leading-none">Receipt ID</h2>
                    <p class="font-mono text-lg font-bold text-slate-800 mt-1">
                        #{{ str_pad($wasteRequest->id, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>

            <!-- Receipt Info Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 text-sm">
                <div>
                    <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Customer Details</h3>
                    <p class="font-bold text-slate-800">{{ $wasteRequest->user->name }}</p>
                    <p class="text-slate-500 font-medium mt-0.5">{{ $wasteRequest->user->email }}</p>
                    <p class="text-slate-500 font-medium mt-0.5">{{ $wasteRequest->user->phone }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Collection Logistics
                    </h3>
                    <p class="font-bold text-slate-850">Scheduled: <span
                            class="text-slate-700 font-medium">{{ $wasteRequest->scheduled_date }}</span></p>
                    <p class="font-bold text-slate-850">Time Slot: <span
                            class="text-slate-700 font-medium truncate">{{ $wasteRequest->scheduled_time }}</span></p>
                </div>
            </div>

            <!-- Collection Details Table -->
            <div class="border-t border-b border-slate-100 py-6 my-6">
                <h3 class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Request Specifications</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm font-semibold">
                        <span class="text-slate-500 font-medium">Waste Category Type</span>
                        <span class="text-slate-900 font-bold">{{ $wasteRequest->waste_type }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm font-semibold">
                        <span class="text-slate-500 font-medium">Uttara Address Zone</span>
                        <span class="text-slate-900 font-bold">{{ $wasteRequest->sector }}</span>
                    </div>
                    @if ($wasteRequest->weight)
                        <div class="flex justify-between items-center text-sm font-semibold">
                            <span class="text-slate-500 font-medium">Estimated Load</span>
                            <span class="text-slate-900 font-bold font-mono">{{ $wasteRequest->weight }} kg</span>
                        </div>
                    @endif
                    <div class="flex justify-between items-start text-sm font-semibold">
                        <span class="text-slate-500 font-medium mt-0.5">Physical Address</span>
                        <span
                            class="text-slate-800 font-medium text-right max-w-[280px] leading-relaxed">{{ $wasteRequest->address }}</span>
                    </div>
                    @if ($wasteRequest->notes)
                        <div class="flex justify-between items-start text-sm font-semibold pt-2 border-t border-slate-50">
                            <span class="text-slate-500 font-medium">Comments / Notes</span>
                            <span
                                class="text-slate-500 font-medium italic text-right max-w-[280px]">{{ $wasteRequest->notes }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Logistics Signature Details -->
            @if ($wasteRequest->collector)
                <div
                    class="bg-teal-50/50 border border-teal-100 p-6 rounded-2xl flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <h4
                            class="text-xs font-black text-teal-800 uppercase tracking-widest mb-1.5 flex items-center gap-1">
                            <i data-lucide="truck" class="w-3.5 h-3.5"></i>
                            <span>Collection Dispatch Completed</span>
                        </h4>
                        <p class="text-sm font-bold text-slate-800">Assigned crew: {{ $wasteRequest->collector->name }}</p>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">Crew Contact:
                            {{ $wasteRequest->collector->phone }}</p>
                    </div>
                    <div class="text-right">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-bold rounded-full uppercase tracking-wider">
                            <i data-lucide="check" class="w-3.5 h-3.5"></i>
                            <span>Done</span>
                        </span>
                    </div>
                </div>
            @endif

            <!-- Invoice Footer Brand -->
            <div class="text-center text-xs text-slate-400 space-y-1 py-4">
                <p>Thank you for participating to build a green and clean environment!</p>
                <p>&copy; {{ date('Y') }} SmartBin Systems. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>
</body>

</html>