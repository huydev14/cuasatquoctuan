<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Cửa Sắt Quốc Tuấn</title>
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
                    class="block px-4 py-2 rounded-lg transition {{ request()->is('admin') && !request()->is('admin/*') ? 'bg-sky-500 text-white' : 'text-slate-900 hover:bg-slate-100' }}">
                    📊 Dashboard
                </a>
                <a href="/admin/projects"
                    class="block px-4 py-2 rounded-lg transition {{ request()->is('admin/projects*') ? 'bg-sky-500 text-white' : 'text-slate-900 hover:bg-slate-100' }}">
                    🏗️ Công trình
                </a>
                <a href="/admin/categories"
                    class="block px-4 py-2 rounded-lg transition {{ request()->is('admin/categories*') ? 'bg-sky-500 text-white' : 'text-slate-900 hover:bg-slate-100' }}">
                    📂 Danh mục
                </a>
                <a href="/admin/contacts"
                    class="block px-4 py-2 rounded-lg transition {{ request()->is('admin/contacts*') ? 'bg-sky-500 text-white' : 'text-slate-900 hover:bg-slate-100' }}">
                    📧 Liên hệ
                </a>
                    <a href="/admin/audit"
                        class="block px-4 py-2 rounded-lg transition {{ request()->is('admin/audit*') ? 'bg-sky-500 text-white' : 'text-slate-900 hover:bg-slate-100' }}">
                        📝 Lịch sử hoạt động
                    </a>
            </nav>

            <div class="mt-8 pt-8 border-t border-slate-200 space-y-2">
                <a href="/" class="block text-sm text-slate-600 hover:text-slate-900">Quay lại trang chủ</a>
                <form method="POST" action="/logout" class="inline w-full">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-slate-600 hover:text-slate-900">Đăng
                        xuất</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <div>
                    @yield('header')
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-600">{{ Auth::user()->name }}</span>
                    <div
                        class="w-10 h-10 rounded-full bg-sky-500 flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto">
                <!-- Flash Messages -->
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

                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
