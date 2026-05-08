<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh mục - Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-['Inter',sans-serif] text-slate-900 antialiased">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white border-r border-slate-200 p-6 hidden md:block">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-slate-900">Admin</h1>
                <p class="text-sm text-slate-500">Cửa Sắt Quốc Tuấn</p>
            </div>

            <nav class="space-y-2">
                <a href="/admin" class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">📊
                    Dashboard</a>
                <a href="/admin/projects"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">🏗️ Công trình</a>
                <a href="/admin/categories" class="block px-4 py-2 rounded-lg bg-sky-500 text-white transition">📂 Danh
                    mục</a>
                <a href="/admin/contacts"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">📧 Liên hệ</a>
            </nav>
        </aside>

        <main class="flex-1">
            <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Sửa Danh mục</h2>
                    <p class="text-sm text-slate-500">Cập nhật thông tin danh mục</p>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="text-sky-500 hover:text-sky-700 font-semibold">←
                    Quay lại</a>
            </div>

            <div class="p-6 max-w-3xl">
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
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                            required
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
                        <a href="{{ route('admin.categories.index') }}"
                            class="text-slate-600 hover:text-slate-900">Hủy</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
