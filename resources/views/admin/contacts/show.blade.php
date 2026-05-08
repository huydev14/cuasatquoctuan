@extends('layouts.admin')

@section('title', 'Chi tiết liên hệ')

@section('header')
    <h2 class="text-2xl font-bold">Chi tiết liên hệ</h2>
@endsection

@section('content')
    <div class="bg-white rounded-lg border border-slate-200 p-6">
        <div class="mb-4">
            <a href="{{ route('admin.contacts.index') }}" class="text-sm text-slate-600 hover:underline">← Quay lại</a>
        </div>

        <div class="grid grid-cols-1 gap-4 text-sm text-slate-700">
            <div><span class="font-semibold">Họ tên:</span> {{ $contact->name }}</div>
            <div><span class="font-semibold">Email:</span> {{ $contact->email }}</div>
            <div><span class="font-semibold">Số điện thoại:</span> {{ $contact->phone }}</div>
            <div><span class="font-semibold">Chủ đề:</span> {{ $contact->subject }}</div>
            <div><span class="font-semibold">Tin nhắn:</span>
                <div class="mt-1 whitespace-pre-wrap text-sm text-slate-800">{{ $contact->message }}</div>
            </div>
            <div><span class="font-semibold">Ngày gửi:</span> {{ $contact->created_at->format('d/m/Y H:i') }}</div>
            <div><span class="font-semibold">Trạng thái:</span>
                <span
                    class="ml-2 inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $contact->status ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800' }}">
                    {{ $contact->status ? '✓ Đã xem' : '○ Chưa xem' }}
                </span>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            <form method="POST" action="{{ route('admin.contacts.update-status', $contact->id) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="{{ $contact->status ? 'false' : 'true' }}">
                <button type="submit"
                    class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">{{ $contact->status ? 'Đánh dấu chưa xem' : 'Đánh dấu đã xem' }}</button>
            </form>
            <a href="{{ url()->previous() }}" class="px-4 py-2 bg-slate-100 rounded-lg hover:bg-slate-200">Đóng</a>
        </div>
    </div>
@endsection
