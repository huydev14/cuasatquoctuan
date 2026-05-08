<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh mục - Admin</title>
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
                <h2 class="text-2xl font-bold">Thêm Danh mục</h2>
                <a href="{{ route('admin.categories.index') }}"
                    class="px-4 py-2 text-slate-600 hover:text-slate-900">
                    ← Quay lại
                </a>
            </div>

            <!-- Content Area -->
            <div class="p-6">
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
            </div>
        </main>
    </div>
</body>

</html>
