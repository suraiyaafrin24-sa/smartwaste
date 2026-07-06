@extends('layouts.admin')

@section('title', 'Manage System Users')

@section('content')

    <div class="mb-3">
        <h1 class="text-[26px] font-black tracking-tight text-gray-900 mb-1">User & Staff Directory</h1>
        <p class="text-sm font-medium text-gray-500">Register and manage Waste Collectors and General Users.</p>
    </div>

    {{-- Two-column layout: form on left, empty right (matches screenshot) --}}
    <div class="flex gap-8">

        {{-- LEFT: Form card ~60% width --}}
        <div class="flex-1 max-w-[680px]">
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_2px_10px_-4px_rgba(0,0,0,0.07)]">

                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h2 class="text-base font-bold text-gray-800">Add New Member</h2>
                </div>

                {{-- Error Messages --}}
                @if ($errors->any())
                    <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6 text-sm font-semibold">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    {{-- Role --}}
                    <div class="mb-5">
                        <label for="role" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                            Assign Operational Role <span class="text-red-500">*</span>
                        </label>
                        <select id="role" name="role" required
                            class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition appearance-none cursor-pointer outline-none">
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select a role</option>
                            <option value="waste_collector" {{ old('role') == 'waste_collector' ? 'selected' : '' }}>Waste Collector (Field Staff)</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>General User (Resident)</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1.5" />
                    </div>

                    {{-- Name & Email --}}
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="name" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="e.g. John Doe"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none placeholder:text-gray-400">
                            <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="e.g. user@cleancity.com"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none placeholder:text-gray-400">
                            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                        </div>
                    </div>

                    {{-- Phone & Sector --}}
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="phone" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Phone Number
                            </label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                placeholder="+1 234 567 8900"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none placeholder:text-gray-400">
                            <x-input-error :messages="$errors->get('phone')" class="mt-1.5" />
                        </div>
                        <div>
                            <label for="sector" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Uttara Sector
                            </label>
                            <select id="sector" name="sector"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition appearance-none cursor-pointer outline-none">
                                <option value="">Select Sector</option>
                                @foreach($sectors as $sec)
                                    <option value="{{ $sec }}" {{ old('sector') == $sec ? 'selected' : '' }}>{{ $sec }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sector')" class="mt-1.5" />
                        </div>
                    </div>

                    {{-- Road & Password --}}
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="road" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Road / Block / House
                            </label>
                            <input id="road" type="text" name="road" value="{{ old('road') }}"
                                placeholder="e.g. Road 12, Sector 4"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none placeholder:text-gray-400">
                            <x-input-error :messages="$errors->get('road')" class="mt-1.5" />
                        </div>
                        <div>
                            <label for="password" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <input id="password" type="password" name="password" required placeholder="••••••••"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none">
                            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                        </div>
                    </div>

                    {{-- Confirm Password (half width, left column) --}}
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        <div>
                            <label for="password_confirmation" class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">
                                Confirm Password <span class="text-red-500">*</span>
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                placeholder="••••••••"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-2 focus:ring-[#19817E] focus:border-[#19817E] p-3 transition outline-none">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end mt-6 pt-5 border-t border-gray-100 gap-3">
                        <a href="{{ route('admin.users') }}"
                            class="text-sm font-semibold text-gray-500 hover:text-gray-700 py-2.5 px-6 rounded-xl hover:bg-gray-100 transition">
                            Cancel
                        </a>
                        <button type="submit"
                            class="bg-[#19817E] text-white text-sm font-bold py-2.5 px-7 rounded-xl hover:bg-teal-700 focus:ring-4 focus:ring-teal-100 transition shadow-sm">
                            Submit Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- RIGHT: empty space (matches screenshot) --}}
        <div class="hidden xl:block flex-1"></div>

    </div>

@endsection