@extends('layouts.admin')

@section('title', 'Sửa Danh mục')

@section('header')
    <div class="flex items-center justify-between w-full">
        <div>
            <h2 class="text-2xl font-bold">Sửa Danh mục</h2>
            <p class="text-sm text-slate-500">Cập nhật thông tin danh mục</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-sky-500 hover:text-sky-700 font-semibold">← Quay lại</a>
    </div>
@endsection

@section('content')
    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category) }}" method="POST"
        class="space-y-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold">Tên danh mục</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-semibold">Mô tả</label>
            <textarea id="description" name="description" rows="5"
                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit"
                class="inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                Cập nhật
            </button>
            <a href="{{ route('admin.categories.index') }}" class="text-slate-600 hover:text-slate-900">Hủy</a>
        </div>
    </form>
    </div>
@endsection
