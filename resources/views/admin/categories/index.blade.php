@extends('layouts.admin')

@section('title', 'Quản lý Danh mục')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold">Quản lý Danh mục</h2>
        </div>
        <a href="{{ route('admin.categories.create') }}"
            class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition">
            + Thêm danh mục
        </a>
    </div>
@endsection

@section('content')

    <!-- Table -->
    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Tên danh mục</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Slug</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Mô tả</th>
                        <th class="px-6 py-3 text-left font-semibold text-slate-900">Số công trình</th>
                        <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-slate-600 text-xs font-mono">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-slate-600 line-clamp-2">{{ $category->description ?? '-' }}</td>
                            <td class="px-6 py-4 text-slate-600">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-sky-100 text-sky-800 font-semibold text-sm">
                                    {{ $category->projects_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="text-sky-500 hover:text-sky-700 font-semibold inline">
                                    Sửa
                                </a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
                                    style="display:inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                Chưa có danh mục nào
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
