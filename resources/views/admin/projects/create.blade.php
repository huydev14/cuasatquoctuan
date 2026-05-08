<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Công trình - Admin</title>
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
                <a href="/admin/projects" class="block px-4 py-2 rounded-lg bg-sky-500 text-white transition">🏗️ Công
                    trình</a>
                <a href="/admin/categories"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">📂 Danh mục</a>
                <a href="/admin/contacts"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">📧 Liên hệ</a>
            </nav>
        </aside>

        <main class="flex-1">
            <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Thêm Công trình</h2>
                    <p class="text-sm text-slate-500">Tạo mới công trình cùng ảnh thực tế</p>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-sky-500 hover:text-sky-700 font-semibold">←
                    Quay lại</a>
            </div>

            <div class="p-6 max-w-4xl">
                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    @csrf

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="title" class="mb-2 block text-sm font-semibold">Tên công trình</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                        </div>

                        <div>
                            <label for="category_id" class="mb-2 block text-sm font-semibold">Danh mục</label>
                            <select id="category_id" name="category_id" required
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold">Mô tả</label>
                        <textarea id="description" name="description" rows="6"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="mb-2 block text-sm font-semibold">Ảnh công trình</label>
                        <input type="file" id="image" name="image" accept="image/*" required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 file:mr-4 file:rounded-full file:border-0 file:bg-sky-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-sky-600">
                    </div>

                    <label class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">
                        <input type="checkbox" name="status" value="1" checked
                            class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-500">
                        <span class="text-sm font-semibold text-slate-700">Hiển thị công trình ngay sau khi lưu</span>
                    </label>

                    <div class="flex items-center gap-3">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                            Lưu công trình
                        </button>
                        <a href="{{ route('admin.projects.index') }}"
                            class="text-slate-600 hover:text-slate-900">Hủy</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
