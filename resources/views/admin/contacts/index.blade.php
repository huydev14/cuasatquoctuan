@extends('layouts.admin')

@section('title', 'Quản lý Liên hệ')

@section('header')
    <h2 class="text-2xl font-bold">Quản lý Liên hệ</h2>
@endsection

@section('content')

    <!-- Filters -->
    <div class="mb-6 flex gap-3">
        <form method="GET" class="flex gap-2 flex-1">
            <input type="text" name="search" placeholder="Tìm kiếm tên, email, số điện thoại..."
                class="flex-1 px-4 py-2 border border-slate-300 rounded-lg focus:border-sky-500 focus:outline-none"
                value="{{ request('search') }}">
            <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">
                Tìm
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Họ tên</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Email</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Số điện thoại</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Chủ đề</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Trạng thái</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Ngày gửi</th>
                        <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $contact->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $contact->email }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $contact->phone }}</td>
                            <td class="px-6 py-4 text-slate-600 line-clamp-1">{{ $contact->subject }}</td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('admin.contacts.update-status', $contact->id) }}"
                                    class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $contact->status ? 'false' : 'true' }}">
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold transition {{ $contact->status ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-slate-100 text-slate-800 hover:bg-slate-200' }}">
                                        {{ $contact->status ? '✓ Đã xem' : '○ Chưa xem' }}
                                    </button>
                                </form>
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
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                Chưa có liên hệ nào
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($contacts->count() > 0)
        <div class="mt-6">
            {{ $contacts->links() }}
        </div>
    @endif
    </div>
    </main>
    </div>

    <!-- Detail modal/script removed: use show page instead -->
@endsection
