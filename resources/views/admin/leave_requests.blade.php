@extends('layouts.admin')

@section('title', 'Leave Requests')

@section('content')
    <div class="mb-8 mt-2">
        <h1 class="text-[28px] font-black tracking-tight text-gray-900 mb-1">Leave Requests</h1>
        <p class="text-sm font-medium text-gray-500">Approve or reject leave applications submitted by waste collector staff members.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-8 text-center py-16 space-y-4">
        <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Collector Leave Requests</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto">Approve or reject leave applications submitted by waste collector staff members.</p>
    </div>
@endsection