@extends('layouts.admin')

@section('title', 'Subscription History')

@section('content')
    <div class="mb-8 mt-2">
        <h1 class="text-[28px] font-black tracking-tight text-gray-900 mb-1">Subscriptions & Payments Logs</h1>
        <p class="text-sm font-medium text-gray-500">Track dynamic billing transactions, user subscriptions and SSLCommerz API payments.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-8 text-center py-16 space-y-4">
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Payments Ledger</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto">Track dynamic billing transactions, user subscriptions and SSLCommerz API payments.</p>
    </div>
@endsection