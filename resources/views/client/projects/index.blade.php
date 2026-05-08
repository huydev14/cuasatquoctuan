<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Công trình - Cửa Sắt Quốc Tuấn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-['Inter',sans-serif] text-slate-900 antialiased">
    <!-- Header -->
    <div class="relative isolate bg-gradient-to-r from-slate-900 to-slate-800 text-white py-16 sm:py-20">
        <img src="{{ asset('assets/img/slider/hinhnen.jpeg') }}" alt="background"
            class="absolute inset-0 h-full w-full object-cover object-top -z-20 opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-slate-950/70 to-slate-950/80 z-10"></div>

        <nav class="relative z-20 flex items-center justify-between px-4 py-5 sm:px-6 lg:px-12">
            <a href="/"
                class="inline-flex items-center rounded-full border border-white/30 bg-white/5 px-4 py-2 text-md font-bold tracking-[0.18em] text-white backdrop-blur-md sm:text-xl">
                CỬA SẮT QUỐC TUẤN
            </a>
            <a href="/" class="text-white hover:text-sky-400 transition">← Quay về trang chủ</a>
        </nav>

        <div class="relative z-20 mx-auto max-w-7xl px-4 sm:px-6 lg:px-12 mt-8 text-center">
            <h1 class="text-5xl font-extrabold tracking-[-0.03em] mb-4">Công trình của chúng tôi</h1>
            <p class="text-lg text-white/80 max-w-3xl mx-auto">
                Những công trình tiêu biểu từ 20+ năm kinh nghiệm thi công cửa sắt, nhôm, kiếng và các hạng mục gia công
                khác.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="px-4 py-24 sm:px-6 lg:px-12">
        <div class="mx-auto max-w-7xl">
            @if ($categories->count() > 0 && $projects->count() > 0)
                <div x-data="{ activeCategory: 'all' }">
                    <div class="mb-16">
                        <div class="flex flex-wrap gap-3 justify-center">
                            <button @click="activeCategory = 'all'"
                                :class="activeCategory === 'all' ? 'bg-sky-500 border-sky-500 text-white' :
                                    'border-slate-300 text-slate-900 bg-transparent'"
                                class="filter-btn rounded-full px-6 py-2 text-sm font-semibold uppercase tracking-[0.06em] border-2 transition duration-300">
                                Tất cả
                            </button>
                            @foreach ($categories as $category)
                                <button @click="activeCategory = '{{ $category->id }}'"
                                    :class="activeCategory === '{{ $category->id }}' ? 'bg-sky-500 border-sky-500 text-white' :
                                        'border-slate-300 text-slate-900 bg-transparent'"
                                    class="filter-btn rounded-full px-6 py-2 text-sm font-semibold uppercase tracking-[0.06em] border-2 transition duration-300">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="space-y-16">
                        <div x-show="activeCategory === 'all'" x-transition:enter="transition duration-500 ease-out"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition duration-300 ease-in"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95" class="projects-section">
                            <h2 class="text-3xl font-extrabold mb-8">Tất cả công trình</h2>
                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($projects as $project)
                                    <div
                                        class="project-card rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-2xl transition">
                                        <div class="relative h-48 overflow-hidden bg-slate-300">
                                            @if ($project->image_path)
                                                <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}"
                                                    class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                            @else
                                                <div
                                                    class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sky-400 to-sky-600">
                                                    <p class="text-white font-semibold">Hình ảnh</p>
                                                </div>
                                            @endif
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent">
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <p
                                                class="text-sm font-semibold uppercase tracking-[0.08em] text-sky-600 mb-2">
                                                {{ $project->category?->name }}
                                            </p>
                                            <h3 class="font-bold text-lg mb-3 line-clamp-2">{{ $project->title }}</h3>
                                            <p class="text-slate-600 text-sm line-clamp-3 mb-4">
                                                {{ $project->description }}</p>
                                            <a href="{{ route('projects.show', $project->slug) }}"
                                                class="inline-flex items-center justify-center rounded-full bg-sky-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                                                Xem chi tiết →
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @foreach ($categories as $category)
                            <div x-show="activeCategory === '{{ $category->id }}'"
                                x-transition:enter="transition duration-500 ease-out"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition duration-300 ease-in"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95" class="projects-section">
                                <h2 class="text-3xl font-extrabold mb-8">{{ $category->name }}</h2>
                                @if ($category->projects->count() > 0)
                                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                                        @foreach ($category->projects as $project)
                                            <div
                                                class="project-card rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-2xl transition">
                                                <div class="relative h-48 overflow-hidden bg-slate-300">
                                                    @if ($project->image_path)
                                                        <img src="{{ asset($project->image_path) }}"
                                                            alt="{{ $project->title }}"
                                                            class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                                    @else
                                                        <div
                                                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sky-400 to-sky-600">
                                                            <p class="text-white font-semibold">Hình ảnh</p>
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent">
                                                    </div>
                                                </div>
                                                <div class="p-6">
                                                    <p
                                                        class="text-sm font-semibold uppercase tracking-[0.08em] text-sky-600 mb-2">
                                                        {{ $project->category?->name }}
                                                    </p>
                                                    <h3 class="font-bold text-lg mb-3 line-clamp-2">
                                                        {{ $project->title }}</h3>
                                                    <p class="text-slate-600 text-sm line-clamp-3 mb-4">
                                                        {{ $project->description }}</p>
                                                    <a href="{{ route('projects.show', $project->slug) }}"
                                                        class="inline-flex items-center justify-center rounded-full bg-sky-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                                                        Xem chi tiết →
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center text-slate-500 py-12">Chưa có công trình nào trong danh mục
                                        này.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div
                        class="rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-2xl transition">
                        <div class="h-48 bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center">
                            <p class="text-white font-semibold">Hình ảnh công trình 1</p>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Cửa sắt mỹ thuật</h3>
                            <p class="text-slate-600 text-sm">Thiết kế theo yêu cầu, chất lượng cao</p>
                        </div>
                    </div>
                    <div
                        class="rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-2xl transition">
                        <div
                            class="h-48 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                            <p class="text-white font-semibold">Hình ảnh công trình 2</p>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Cổng nhôm kiếng</h3>
                            <p class="text-slate-600 text-sm">Sang trọng và bền vững</p>
                        </div>
                    </div>
                    <div
                        class="rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-2xl transition">
                        <div
                            class="h-48 bg-gradient-to-br from-slate-400 to-slate-600 flex items-center justify-center">
                            <p class="text-white font-semibold">Hình ảnh công trình 3</p>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Lan can sắt</h3>
                            <p class="text-slate-600 text-sm">An toàn và thẩm mỹ</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="bg-gradient-to-r from-sky-500 to-sky-600 px-4 py-16 text-center text-white sm:px-6 lg:px-12">
        <h2 class="text-4xl font-extrabold mb-4">Bạn cần tư vấn?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">Hãy liên hệ với chúng tôi để nhận tư vấn miễn phí và báo giá chi
            tiết.
        </p>
        <a href="/#contact"
            class="inline-flex items-center justify-center rounded-full bg-white px-8 py-3 text-base font-bold uppercase tracking-[0.06em] text-sky-600 transition hover:bg-slate-100">
            Liên hệ ngay
        </a>
    </section>

</body>

</html>
