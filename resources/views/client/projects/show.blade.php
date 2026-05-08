<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Cửa Sắt Quốc Tuấn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-['Inter',sans-serif] text-slate-900 antialiased">
    <div class="relative isolate overflow-hidden bg-gradient-to-r from-slate-900 to-slate-800 text-white">
        <img src="{{ asset('assets/img/slider/hinhnen.jpeg') }}" alt="background"
            class="absolute inset-0 h-full w-full object-cover object-top -z-20 opacity-35">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-slate-950/70 to-slate-950/80 z-10"></div>

        <div class="relative z-20 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-12">
            <a href="/projects" class="text-white/80 hover:text-white transition">← Quay lại danh sách công trình</a>
            <div class="mt-10 grid grid-cols-1 gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div class="space-y-5">
                    <p
                        class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold tracking-[0.08em] text-white/90">
                        {{ $project->category?->name }}
                    </p>
                    <h1 class="text-4xl font-extrabold tracking-[-0.03em] sm:text-5xl leading-tight">
                        {{ $project->title }}
                    </h1>
                    <p class="max-w-3xl text-lg leading-8 text-white/80">
                        {{ $project->description }}
                    </p>
                </div>

                <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-2xl">
                    @if ($project->image_path)
                        <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}"
                            class="h-full w-full object-cover">
                    @else
                        <div
                            class="flex min-h-[360px] items-center justify-center bg-gradient-to-br from-sky-400 to-sky-600">
                            <p class="text-white font-semibold">Hình ảnh dự án</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <section class="px-4 py-24 sm:px-6 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1fr_0.8fr]">
                <div class="space-y-8">
                    <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                        <h2 class="mb-4 text-2xl font-bold">Mô tả chi tiết</h2>
                        <p class="text-lg leading-8 text-slate-700 whitespace-pre-line">
                            {{ $project->description ?: 'Chưa có mô tả chi tiết cho công trình này.' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-8">
                        <h2 class="mb-4 text-2xl font-bold">Bạn cần công trình tương tự?</h2>
                        <p class="text-lg leading-8 text-slate-600">
                            Chúng tôi nhận thi công theo yêu cầu cho cửa sắt, cổng, lan can, mái che và nhiều hạng mục
                            cơ khí khác.
                        </p>
                        <a href="/#contact"
                            class="mt-6 inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                            Liên hệ tư vấn
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                        <h2 class="mb-6 text-2xl font-bold">Thông tin công trình</h2>
                        <div class="space-y-4 text-slate-700">
                            <div class="flex items-center justify-between gap-4 border-b border-slate-100 pb-3">
                                <span class="font-semibold text-slate-500">Danh mục</span>
                                <span>{{ $project->category?->name }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4 border-b border-slate-100 pb-3">
                                <span class="font-semibold text-slate-500">Trạng thái</span>
                                <span>{{ $project->status ? 'Đang hiển thị' : 'Đang ẩn' }}</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="font-semibold text-slate-500">Ngày cập nhật</span>
                                <span>{{ $project->updated_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>

                    @if ($relatedProjects->count() > 0)
                        <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
                            <h2 class="mb-6 text-2xl font-bold">Công trình liên quan</h2>
                            <div class="space-y-4">
                                @foreach ($relatedProjects as $relatedProject)
                                    <a href="{{ route('projects.show', $relatedProject->slug) }}"
                                        class="flex gap-4 rounded-xl border border-slate-200 p-3 transition hover:border-sky-300 hover:bg-sky-50">
                                        <div class="h-20 w-24 overflow-hidden rounded-lg bg-slate-200 flex-shrink-0">
                                            @if ($relatedProject->image_path)
                                                <img src="{{ asset($relatedProject->image_path) }}"
                                                    alt="{{ $relatedProject->title }}"
                                                    class="h-full w-full object-cover">
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold uppercase tracking-[0.08em] text-sky-600">
                                                {{ $relatedProject->category?->name }}</p>
                                            <h3 class="font-bold text-slate-900">{{ $relatedProject->title }}</h3>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</body>

</html>
