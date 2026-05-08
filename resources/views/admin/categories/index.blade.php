<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh mục - Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-['Inter',sans-serif] text-slate-900 antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-slate-200 p-6 hidden md:block">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900">Admin</h1>
                <p class="text-sm text-slate-500">Cửa Sắt Quốc Tuấn</p>
            </div>

            <nav class="space-y-2">
                <a href="/admin"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
                    📊 Dashboard
                </a>
                <a href="/admin/projects"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
                    🏗️ Công trình
                </a>
                <a href="/admin/categories"
                    class="block px-4 py-2 rounded-lg bg-sky-500 text-white transition">
                    📂 Danh mục
                </a>
                <a href="/admin/contacts"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
                    📧 Liên hệ
                </a>
            </nav>

            <div class="mt-8 pt-8 border-t border-slate-200">
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-slate-600 hover:text-slate-900">Đăng xuất</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Top Bar -->
            <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <h2 class="text-2xl font-bold">Quản lý Danh mục</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.categories.create') }}"
                        class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition">
                        + Thêm danh mục
                    </a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
                        ✓ {{ session('success') }}
                    </div>
                @endif

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
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-sky-100 text-sky-800 font-semibold text-sm">
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
            </div>
        </main>
    </div>
</body>

</html>
