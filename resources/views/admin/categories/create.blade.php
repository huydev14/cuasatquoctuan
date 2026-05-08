@extends('layouts.admin')

@section('title', 'Thêm Danh mục')

@section('header')
    <div class="flex items-center justify-between w-full">
        <h2 class="text-2xl font-bold">Thêm Danh mục</h2>
        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-slate-600 hover:text-slate-900">
            ← Quay lại
        </a>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl bg-white rounded-lg border border-slate-200 p-8">
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-red-800 font-semibold mb-2">Lỗi:</p>
                <ul class="list-disc list-inside text-red-700 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold mb-2">Tên danh mục</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20"
                    value="{{ old('name') }}">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold mb-2">Mô tả</label>
                <textarea id="description" name="description" rows="5"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">{{ old('description') }}</textarea>
                <p class="text-xs text-slate-500 mt-1">Mô tả chi tiết về danh mục (tùy chọn)</p>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="px-6 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition font-semibold">
                    Thêm danh mục
                </button>
                <a href="{{ route('admin.categories.index') }}"
                    class="px-6 py-2 border border-slate-300 text-slate-900 rounded-lg hover:bg-slate-50 transition font-semibold">
                    Hủy
                </a>
            </div>
        </form>
    </div>
@endsection
