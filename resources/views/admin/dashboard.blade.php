<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
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
                <a href="/admin" class="block px-4 py-2 rounded-lg bg-sky-500 text-white transition">
                    📊 Dashboard
                </a>
                <a href="/admin/projects"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
                    🏗️ Công trình
                </a>
                <a href="/admin/categories"
                    class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
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
                <h2 class="text-2xl font-bold">Dashboard</h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-600">Admin User</span>
                    <div
                        class="w-10 h-10 rounded-full bg-sky-500 flex items-center justify-center text-white font-bold">
                        A
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6">
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <p class="text-sm text-slate-600 mb-2">Tổng liên hệ</p>
                        <p class="text-4xl font-bold text-slate-900">{{ $totalContacts ?? 0 }}</p>
                    </div>
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <p class="text-sm text-slate-600 mb-2">Chưa xem</p>
                        <p class="text-4xl font-bold text-amber-600">{{ $unreadContacts ?? 0 }}</p>
                    </div>
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <p class="text-sm text-slate-600 mb-2">Công trình</p>
                        <p class="text-4xl font-bold text-slate-900">-</p>
                    </div>
                </div>

                <!-- Recent Contacts -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200">
                        <h3 class="text-lg font-bold">Liên hệ gần đây</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Họ tên</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Số điện thoại</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Trạng thái</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Ngày gửi</th>
                                    <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @forelse($recentContacts ?? [] as $contact)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4 font-medium text-slate-900">{{ $contact->name }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $contact->phone }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $contact->status ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800' }}">
                                                {{ $contact->status ? '✓ Đã xem' : '○ Chưa xem' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600 text-xs">
                                            {{ $contact->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="/admin/contacts"
                                                class="text-sky-500 hover:text-sky-700 font-semibold">
                                                Xem
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                            Chưa có liên hệ nào
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
