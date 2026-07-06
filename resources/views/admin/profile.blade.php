@extends('layouts.admin')

@section('title', 'Profile Settings')

@section('content')
    <div class="mb-8 mt-2">
        <h1 class="text-[28px] font-black tracking-tight text-gray-900 mb-1">Profile Settings</h1>
        <p class="text-sm font-medium text-gray-500">Update your dashboard credentials, notification preferences, and security passwords.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-8 text-center py-16 space-y-4">
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900">Manage Administrator Credentials</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto">Update your dashboard credentials, notifications preferences, and security passwords.</p>
    </div>
@endsection