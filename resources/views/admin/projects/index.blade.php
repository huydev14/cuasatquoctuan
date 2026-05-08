<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Công trình - Admin</title>
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

            <div class="mt-8 pt-8 border-t border-slate-200">
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-slate-600 hover:text-slate-900">Đăng xuất</button>
                </form>
            </div>
        </aside>

        <main class="flex-1">
            <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Quản lý Công trình</h2>
                    <p class="text-sm text-slate-500">Thêm, sửa, xóa công trình và ảnh thực tế</p>
                </div>
                <a href="{{ route('admin.projects.create') }}"
                    class="inline-flex items-center justify-center rounded-full bg-sky-500 px-5 py-3 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                    + Thêm công trình
                </a>
            </div>

            <div class="p-6">
                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Ảnh</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Tên công trình</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Danh mục</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Trạng thái</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Ngày tạo</th>
                                    <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @forelse ($projects as $project)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4">
                                            <div class="h-14 w-20 overflow-hidden rounded-lg bg-slate-200">
                                                @if ($project->image_path)
                                                    <img src="{{ asset($project->image_path) }}"
                                                        alt="{{ $project->title }}" class="h-full w-full object-cover">
                                                @else
                                                    <div
                                                        class="flex h-full w-full items-center justify-center text-xs text-slate-500">
                                                        No img</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-slate-900">{{ $project->title }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $project->category?->name }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $project->status ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800' }}">
                                                {{ $project->status ? 'Đang hiển thị' : 'Đang ẩn' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600 text-xs">
                                            {{ $project->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('admin.projects.edit', $project) }}"
                                                    class="rounded-full bg-amber-400 px-4 py-2 text-xs font-bold uppercase tracking-[0.06em] text-slate-900 transition hover:brightness-95">
                                                    Sửa
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="POST" onsubmit="return confirm('Xóa công trình này?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="rounded-full bg-red-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.06em] text-white transition hover:bg-red-600">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                            Chưa có công trình nào.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($projects->hasPages())
                    <div class="mt-6">
                        {{ $projects->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
