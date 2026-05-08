<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Liên hệ - Admin</title>
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
                <a href="/admin" class="block px-4 py-2 rounded-lg text-slate-900 hover:bg-slate-100 transition">
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
                <a href="/admin/contacts" class="block px-4 py-2 rounded-lg bg-sky-500 text-white transition">
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
                <h2 class="text-2xl font-bold">Quản lý Liên hệ</h2>
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
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <!-- Filters -->
                <div class="mb-6 flex gap-3">
                    <form method="GET" class="flex gap-2 flex-1">
                        <input type="text" name="search" placeholder="Tìm kiếm tên, email, số điện thoại..."
                            class="flex-1 px-4 py-2 border border-slate-300 rounded-lg focus:border-sky-500 focus:outline-none"
                            value="{{ request('search') }}">
                        <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600">
                            Tìm
                        </button>
                    </form>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Họ tên</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Email</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Số điện thoại</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Chủ đề</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Trạng thái</th>
                                    <th class="px-6 py-3 text-left font-semibold text-slate-900">Ngày gửi</th>
                                    <th class="px-6 py-3 text-center font-semibold text-slate-900">Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                @forelse($contacts as $contact)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-6 py-4 font-medium text-slate-900">{{ $contact->name }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $contact->email }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $contact->phone }}</td>
                                        <td class="px-6 py-4 text-slate-600 line-clamp-1">{{ $contact->subject }}</td>
                                        <td class="px-6 py-4">
                                            <form method="POST"
                                                action="{{ route('admin.contacts.update-status', $contact->id) }}"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status"
                                                    value="{{ $contact->status ? 'false' : 'true' }}">
                                                <button type="submit"
                                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold transition {{ $contact->status ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-slate-100 text-slate-800 hover:bg-slate-200' }}">
                                                    {{ $contact->status ? '✓ Đã xem' : '○ Chưa xem' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600 text-xs">
                                            {{ $contact->created_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <button type="button" onclick="showDetail({{ $contact->id }})"
                                                class="text-sky-500 hover:text-sky-700 font-semibold">
                                                Xem
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center text-slate-500">
                                            Chưa có liên hệ nào
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if ($contacts->count() > 0)
                    <div class="mt-6">
                        {{ $contacts->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4"
        x-data="{ open: false }" @keydown.escape="open = false">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-auto" x-show="open" x-transition>
            <div class="sticky top-0 bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <h3 class="text-xl font-bold">Chi tiết liên hệ</h3>
                <button onclick="closeDetail()"
                    class="text-slate-400 hover:text-slate-600 text-2xl leading-none">×</button>
            </div>
            <div class="p-6" id="detailContent">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        function showDetail(contactId) {
            const modal = document.getElementById('detailModal');
            const content = document.getElementById('detailContent');

            const row = document.querySelector(`tr[data-id="${contactId}"]`);
            if (!row) {
                // Simulate detail view - in real app, you'd fetch from API
                content.innerHTML = `
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1">Tên</label>
                            <p class="text-slate-900">Contact ${contactId}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1">Email</label>
                            <p class="text-slate-900">contact@example.com</p>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-600 mb-1">Tin nhắn</label>
                            <p class="text-slate-900 whitespace-pre-wrap">Loading...</p>
                        </div>
                    </div>
                `;
            }

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.style.opacity = '1';
            }, 10);
        }

        function closeDetail() {
            const modal = document.getElementById('detailModal');
            modal.classList.add('hidden');
        }

        document.getElementById('detailModal')?.addEventListener('click', (e) => {
            if (e.target.id === 'detailModal') {
                closeDetail();
            }
        });
    </script>
</body>

</html>
