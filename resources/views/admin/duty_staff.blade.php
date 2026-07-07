@extends('layouts.admin')

@section('title', 'Staff Schedule')

@section('content')
    <div class="mb-8 mt-2">
        <h1 class="text-[28px] font-black tracking-tight text-gray-900 mb-1">Duty staff Console</h1>
        <p class="text-sm font-medium text-gray-500">Create weekly route schedules for waste zoning systems in Uttara.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-8 text-center py-16 space-y-4">
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Manage collector crew timeslots</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto">Create weekly routes schedules for waste zoning systems in Uttara.</p>
    </div>
@endsection