@extends('layouts.admin')

@section('title', 'Dashboard')

@section('header')
    <h2 class="text-2xl font-bold">Dashboard</h2>
@endsection

@section('content')
    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg border border-slate-200 p-6">
            <p class="text-sm text-slate-600 mb-2">Tổng liên hệ</p>
            <p class="text-4xl font-bold text-slate-900">{{ $totalContacts ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-lg border border-slate-200 p-6">
            <p class="text-sm text-slate-600 mb-2">Chưa xem</p>
            <p class="text-4xl font-bold text-amber-600">{{ $unreadContacts ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-lg border border-slate-200 p-6">
            <p class="text-sm text-slate-600 mb-2">Công trình</p>
            <p class="text-4xl font-bold text-slate-900">-</p>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200">
            <h3 class="text-lg font-bold">Liên hệ gần đây</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Họ tên</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Số điện thoại</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Trạng thái</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Ngày gửi</th>
                        <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($recentContacts ?? [] as $contact)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $contact->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $contact->phone }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $contact->status ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800' }}">
                                    {{ $contact->status ? '✓ Đã xem' : '○ Chưa xem' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600 text-xs">
                                {{ $contact->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="text-sky-500 hover:text-sky-700 font-semibold">Xem</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                Chưa có liên hệ nào
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
