<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-['Inter',sans-serif] text-slate-900 antialiased">
    <div class="relative isolate min-h-screen w-full overflow-hidden">
        <img src="{{ asset('assets/img/slider/hinhnen.jpeg') }}" alt="background"
            class="absolute inset-0 h-full w-full object-cover object-top -z-20">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/45 via-slate-950/60 to-slate-950/85 z-10"></div>

        <div class="relative z-20 flex min-h-screen flex-col">
            <nav class="absolute inset-x-0 top-0 z-20 flex items-center justify-between px-4 py-5 sm:px-6 lg:px-12">
                <a href="/"
                    class="inline-flex items-center rounded-full border border-white/30 bg-white/5 px-4 py-2 text-md font-bold tracking-[0.18em] text-white backdrop-blur-md sm:text-xl">
                    CỬA SẮT QUỐC TUẤN
                </a>

                <div
                    class="nav-menu fixed inset-y-0 right-0 z-30 flex w-[min(84vw,360px)] translate-x-full flex-col items-center justify-center gap-4 bg-white/90 px-6 py-8 opacity-0 pointer-events-none shadow-2xl backdrop-blur-xl transition-transform duration-500 ease-out md:static md:flex md:w-auto md:flex-row md:translate-x-0 md:bg-transparent md:p-0 md:opacity-100 md:pointer-events-auto md:shadow-none">
                    <ul class="flex flex-col items-center gap-3 md:flex-row md:gap-2">
                        <li><a href="/"
                                class="inline-flex rounded-full bg-sky-500 px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-slate-950 transition hover:-translate-y-0.5">Trang
                                chủ</a></li>
                        <li><a href="#about-us"
                                class="inline-flex rounded-full px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-white/90 transition hover:bg-white/10 hover:text-white">Về chúng tôi</a></li>
                        <li><a href="/projects"
                                class="inline-flex rounded-full px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-white/90 transition hover:bg-white/10 hover:text-white">Công
                                trình</a></li>
                        <li><a href="#contact"
                                class="inline-flex rounded-full px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-white/90 transition hover:bg-white/10 hover:text-white">Liên
                                hệ</a></li>
                    </ul>
                </div>

                <button type="button"
                    class="menu-hamburger relative z-40 inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/20 bg-white/5 text-white backdrop-blur-md transition hover:bg-white/10 md:hidden"
                    aria-label="Toggle menu" aria-expanded="false">
                    <img src="{{ asset('assets/img/fonts/menu-btn.png') }}" alt="menu-hamburger"
                        class="h-7 w-7 transition-transform duration-300">
                </button>
            </nav>

            <div class="flex flex-1 items-center justify-center px-4 pb-16 pt-28 sm:px-6 lg:px-12 lg:pt-0 lg:pb-0">
                <div class="max-w-6xl mx-auto w-full space-y-5 text-left">
                    <p
                        class="hero-reveal inline-flex w-fit rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium tracking-[0.06em] text-white/90 backdrop-blur-md">
                        Cửa sắt mỹ thuật, cổng, lan can, mái che
                    </p>
                    <h1
                        class="hero-reveal hero-reveal-delay-1 text-3xl text-white font-extrabold tracking-[-0.03em] sm:text-5xl leading-[1.5] drop-shadow-md">
                        Cửa Sắt Quốc Tuấn
                    </h1>
                    <h2
                        class="hero-reveal hero-reveal-delay-1 text-3xl text-white font-extrabold tracking-[-0.03em] sm:text-5xl leading-[1.5] drop-shadow-md">
                        Nghệ thuật từ sắt thép, niềm tin cho mọi nhà.
                    </h2>
                    <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-base leading-7 sm:text-lg text-white/80">
                        Thi công theo yêu cầu, tối ưu thẩm mỹ và độ bền cho từng công trình.
                        Cam kết chất lượng, tiến độ và sự hài lòng của khách hàng.
                    </p>
                    <div class="hero-reveal hero-reveal-delay-3 flex flex-col gap-3 sm:flex-row">
                        <a href="#featured-projects"
                            class="inline-flex min-h-12 items-center justify-center rounded-full bg-sky-500 px-6 text-sm font-bold uppercase tracking-[0.06em] text-slate-950 transition hover:-translate-y-0.5 hover:bg-sky-400">
                            Xem mẫu cửa
                        </a>
                        <a href="/projects"
                            class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 bg-white/5 px-6 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:-translate-y-0.5 hover:bg-white/10">
                            Nhận báo giá ngay
                        </a>
                    </div>
                </div>

                <!-- Scroll Down Hint -->
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
                    <a href="#"
                        class="flex flex-col items-center gap-2 text-white/60 hover:text-white transition">
                        <span class="text-sm font-semibold uppercase tracking-[0.06em]">Kéo xuống</span>
                        <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section id="about-us"
        class="relative min-h-[80vh] bg-gradient-to-br from-sky-50 to-slate-100 px-4 py-24 text-slate-900 sm:px-6 lg:px-12 flex items-center">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-center w-full">
            <div class="space-y-6">
                <h2 data-animate="slideInLeft"
                    class="hero-reveal hero-reveal-delay-1 max-w-3xl text-4xl font-extrabold leading-tight tracking-[-0.03em] lg:text-6xl">
                    Thi công chất lượng, dịch vụ rõ ràng
                </h2>
                <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-lg leading-8 text-slate-700"
                    data-animate="fadeInUp" data-delay="100">
                    Cơ Sắt Quốc Tuấn là cơ sở kinh doanh cơ khí chuyên thi công cửa sắt, nhôm, kiếng, cổng, lan can,
                    mái che và các hạng mục gia công theo yêu cầu. Chúng tôi tập trung vào tính bền vững, thẩm mỹ và
                    độ hoàn thiện của từng công trình, phù hợp cho nhà ở, cửa hàng và công trình dân dụng.
                </p>
                <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-lg leading-8 text-slate-700"
                    data-animate="fadeInUp" data-delay="200">
                    Với kinh nghiệm hơn 20 năm trong ngành, đội ngũ của chúng tôi hiểu rõ cách tối ưu vật liệu, kết
                    cấu và phong cách thiết kế để mang lại giải pháp đẹp, chắc chắn và đáng tin cậy cho khách hàng.
                </p>

                <a href="#featured-projects" data-animate="fadeInUp" data-delay="300"
                    class="inline-flex mt-4 items-center justify-center rounded-full bg-amber-400 px-6 py-3 text-sm font-bold uppercase tracking-[0.06em] text-slate-900 transition hover:bg-amber-500">
                    Xem công trình</a>
            </div>

            <div class="relative" data-animate="slideInRight">
                <img src="{{ asset('assets/img/project-1.jpg') }}" alt="Project 1" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/10 to-transparent">
                </div>
            </div>
        </div>
    </section>

    <section id="featured-projects"
        class="bg-slate-50 px-4 py-24 sm:px-6 lg:px-12 min-h-[40vh] flex flex-col justify-center">
        <div class="mx-auto max-w-7xl">
            <div class="mb-12 text-center">
                <h2 class="hero-reveal text-4xl font-extrabold leading-tight tracking-[-0.03em] lg:text-5xl"
                    data-animate="fadeInUp">
                    Công trình nổi bật
                </h2>
                <p class="hero-reveal hero-reveal-delay-1 mt-4 text-lg leading-8 text-slate-600 max-w-3xl mx-auto"
                    data-animate="fadeInUp" data-delay="100">
                    Một vài mẫu tiêu biểu từ dữ liệu thực tế. Nếu chưa có dữ liệu, trang sẽ hiển thị mẫu cố định hiện
                    tại.
                </p>
            </div>

            @if (isset($projects) && $projects->count() > 0)
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($projects->take(3) as $project)
                        <div data-animate="scaleIn" data-delay="{{ $loop->index * 100 }}"
                            class="rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-lg transition hover:shadow-2xl">
                            <div class="relative h-48 overflow-hidden bg-slate-200">
                                @if ($project->image_path)
                                    <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}"
                                        class="h-full w-full object-cover transition duration-300 hover:scale-105">
                                @else
                                    <div
                                        class="flex h-full w-full items-center justify-center bg-gradient-to-br from-sky-400 to-sky-600">
                                        <p class="font-semibold text-white">Hình ảnh dự án</p>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <p class="mb-2 text-sm font-semibold uppercase tracking-[0.08em] text-sky-600">
                                    {{ $project->category?->name }}</p>
                                <h3 class="mb-3 text-xl font-bold">{{ $project->title }}</h3>
                                <p class="text-sm leading-7 text-slate-600 line-clamp-3">{{ $project->description }}
                                </p>
                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="mt-5 inline-flex items-center justify-center rounded-full bg-sky-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div data-animate="scaleIn"
                        class="rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-lg transition hover:shadow-2xl">
                        <div class="h-48 bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center">
                            <p class="text-white font-semibold">Hình ảnh công trình 1</p>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Cửa sắt mỹ thuật</h3>
                            <p class="text-slate-600 text-sm">Thiết kế theo yêu cầu, chất lượng cao</p>
                        </div>
                    </div>
                    <div data-animate="scaleIn" data-delay="100"
                        class="rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-lg transition hover:shadow-2xl">
                        <div
                            class="h-48 bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                            <p class="text-white font-semibold">Hình ảnh công trình 2</p>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Cổng nhôm kiếng</h3>
                            <p class="text-slate-600 text-sm">Sang trọng và bền vững</p>
                        </div>
                    </div>
                    <div data-animate="scaleIn" data-delay="200"
                        class="rounded-2xl overflow-hidden border border-slate-200 bg-white shadow-lg transition hover:shadow-2xl">
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

            <div class="mt-12 flex justify-center">
                <a href="/projects" data-animate="fadeInUp" data-delay="300"
                    class="inline-flex items-center justify-center rounded-full border-2 border-slate-400 px-8 py-3 text-sm font-bold uppercase tracking-[0.06em] text-slate-900 shadow-sm transition duration-300 hover:border-sky-500 hover:bg-sky-50 hover:text-sky-600">
                    Xem thêm công trình
                </a>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-white px-4 py-24 text-slate-900 sm:px-6 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <h2 data-animate="fadeInUp"
                class="hero-reveal text-4xl font-extrabold leading-tight tracking-[-0.03em] lg:text-5xl mb-8 text-center">
                Liên hệ với chúng tôi
            </h2>
            <p class="hero-reveal hero-reveal-delay-1 text-lg leading-8 text-slate-600 text-center mb-12"
                data-animate="fadeInUp" data-delay="100">
                Hãy gửi yêu cầu của bạn và chúng tôi sẽ liên hệ với bạn sớm nhất có thể.
            </p>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 lg:grid-rows-2">
                <div data-animate="slideInLeft"
                    class="hero-reveal hero-reveal-delay-2 rounded-2xl overflow-hidden border border-slate-200 shadow-lg lg:col-span-1 lg:row-span-1">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20299.852345436677!2d106.59228908731792!3d10.773407800000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752d00083f4f9b%3A0xba79eaa326ef13e1!2zVsSDbiBwaMOybmcgY-G7rWEgc-G6r3QgUXXhu5FjIFR14bqlbg!5e0!3m2!1svi!2s!4v1778271753058!5m2!1svi!2s"
                        width="100%" height="100%" style="border:0; min-height:400px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <form method="POST" action="{{ route('contact.store') }}" data-animate="slideInRight"
                    class="hero-reveal hero-reveal-delay-2 lg:row-span-3 space-y-6 bg-slate-50 p-8 rounded-2xl border border-slate-200">
                    @csrf

                    @if(session('success'))
                        <div class="rounded-md bg-green-50 p-4 border border-green-100">
                            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    <h3 class="text-lg font-bold">Gửi yêu cầu</h3>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-semibold mb-2">Họ và tên</label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold mb-2">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                                class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold mb-2">Chủ đề</label>
                        <input type="text" id="subject" name="subject" required value="{{ old('subject') }}"
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold mb-2">Tin nhắn</label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 text-slate-900 placeholder-slate-500 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500/20">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                        class="w-full inline-flex items-center justify-center rounded-full bg-sky-500 px-6 py-3 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:bg-sky-600">
                        Gửi yêu cầu
                    </button>
                </form>

                <!-- Contact Info Section (spans 2 cols, 1 row) -->
                <div data-animate="fadeInUp" data-delay="200"
                    class="hero-reveal hero-reveal-delay-2 bg-slate-50 p-8 rounded-2xl border border-slate-200 lg:col-span-1 lg:row-span-1">
                    <h3 class="text-2xl font-bold mb-6">Thông tin liên hệ</h3>

                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-2">Địa chỉ</p>
                            <p class="text-base leading-relaxed text-slate-900">
                                225/27/21 Lê Văn Quới<br>
                                P. Bình Trị Đông, Q. Bình Tân<br>
                                TP HCM
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-600 mb-2">Điện thoại</p>
                            <div class="space-y-1">
                                <p class="text-base text-slate-900"><a href="tel:0908657117"
                                        class="text-sky-500 hover:text-sky-700 font-semibold">0908 657 117</a></p>
                                <p class="text-base text-slate-900"><a href="tel:0906922285"
                                        class="text-sky-500 hover:text-sky-700 font-semibold">0906 922 285</a></p>
                                <p class="text-sm text-slate-600 mt-2">Mr. Tuấn</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-200">
                            <p class="text-center italic text-slate-600 text-sm">
                                Hân hạnh được phục vụ quý khách
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
