@extends('layouts.admin')

@section('title', 'Waste Collections')

@section('content')
    <div class="mb-8 mt-2">
        <h1 class="text-[28px] font-black tracking-tight text-gray-900 mb-1">Zoning Dispatch Logs & Assignments</h1>
        <p class="text-sm font-medium text-gray-500">Query and assign active collector crews to pending resident requests.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm font-semibold text-slate-700">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">ID</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Type</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Sector</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Created By</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Collector Staff</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($collections as $c)
                        <tr class="hover:bg-gray-50/30 transition">
                            <td class="px-6 py-4 font-mono text-xs text-slate-400">#{{ $c->id }}</td>
                            <td class="px-6 py-4">{{ $c->waste_type }}</td>
                            <td class="px-6 py-4 font-bold">{{ $c->sector }}</td>
                            <td class="px-6 py-4">{{ $c->user->name }}</td>
                            <td class="px-6 py-4">
                                @if($c->collector)
                                    <span class="text-emerald-600">{{ $c->collector->name }}</span>
                                @else
                                    <span class="text-slate-400 italic">None</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">{{ $c->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100">{{ $collections->links() }}</div>
    </div>
@endsection