@extends('layouts.admin')

@section('title', 'Audit Log')

@section('header')
    <h2 class="text-2xl font-bold">Audit Log</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">#</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">User</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Action</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">IP</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Agent</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">When</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($logs as $log)
                        <tr>
                            <td class="px-6 py-4">{{ $log->id }}</td>
                            <td class="px-6 py-4">{{ $log->user?->name ?? 'Guest' }}</td>
                            <td class="px-6 py-4 font-mono text-xs">{{ $log->action }}</td>
                            <td class="px-6 py-4">{{ $log->ip }}</td>
                            <td class="px-6 py-4 text-xs line-clamp-2">{{ $log->user_agent }}</td>
                            <td class="px-6 py-4 text-xs">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">No logs yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
@endsection
