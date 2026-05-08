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

<body class="bg-slate-950 font-['Inter',sans-serif] text-white antialiased">
    <div class="relative isolate min-h-screen w-full overflow-hidden">
        <img src="{{ asset('assets/img/slider/hinhnen.jpeg') }}" alt="background" class="absolute inset-0 h-full w-full object-cover object-top -z-20">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/45 via-slate-950/60 to-slate-950/85 z-10"></div>

        <div class="relative z-20 flex min-h-screen flex-col">
            <nav class="absolute inset-x-0 top-0 z-20 flex items-center justify-between px-4 py-5 sm:px-6 lg:px-12">
                <a href="/"
                    class="inline-flex items-center rounded-full border border-white/30 bg-white/5 px-4 py-2 text-md font-bold tracking-[0.18em] text-white backdrop-blur-md sm:text-xl">
                    CỬA SẮT QUỐC TUẤN
                </a>

                <div
                    class="nav-menu fixed inset-y-0 right-0 z-30 flex w-[min(84vw,360px)] translate-x-full flex-col items-center justify-center gap-4 bg-slate-950/90 px-6 py-8 opacity-0 pointer-events-none shadow-2xl backdrop-blur-xl transition-transform duration-500 ease-out md:static md:flex md:w-auto md:flex-row md:translate-x-0 md:bg-transparent md:p-0 md:opacity-100 md:pointer-events-auto md:shadow-none">
                    <ul class="flex flex-col items-center gap-3 md:flex-row md:gap-2">
                        <li><a href="/"
                                class="inline-flex rounded-full bg-sky-500 px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-slate-950 transition hover:-translate-y-0.5">Trang chủ</a></li>
                        <li><a href=""
                                class="inline-flex rounded-full px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-white/90 transition hover:bg-white/10 hover:text-white">Về  chúng tôi</a></li>
                        <li><a href=""
                                class="inline-flex rounded-full px-4 py-2 text-sm font-semibold uppercase tracking-[0.06em] text-white/90 transition hover:bg-white/10 hover:text-white">Công trình</a></li>
                        <li><a href=""
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
                <div class="max-w-4xl mx-auto w-full space-y-5 text-left">
                    <p
                        class="hero-reveal inline-flex w-fit rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium tracking-[0.06em] text-white/90 backdrop-blur-md">
                        Cửa sắt mỹ thuật, cổng, lan can, mái che
                    </p>
                    <h1
                        class="hero-reveal hero-reveal-delay-1 text-3xl font-extrabold tracking-[-0.03em] sm:text-5xl leading-[1.5] drop-shadow-md">
                        Cửa Sắt Quốc Tuấn - <br>Nghệ thuật từ sắt thép, niềm tin cho mọi nhà
                    </h1>
                    <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-base leading-7 sm:text-lg text-white/80">
                        Thi công theo yêu cầu, tối ưu thẩm mỹ và độ bền cho từng công trình.
                        Cam kết chất lượng, tiến độ và sự hài lòng của khách hàng.
                    </p>
                    <div class="hero-reveal hero-reveal-delay-3 flex flex-col gap-3 sm:flex-row">
                        <a href="#mau-cua"
                            class="inline-flex min-h-12 items-center justify-center rounded-full bg-sky-500 px-6 text-sm font-bold uppercase tracking-[0.06em] text-slate-950 transition hover:-translate-y-0.5 hover:bg-sky-400">
                            Xem mẫu cửa
                        </a>
                        <a href="#bao-gia"
                            class="inline-flex min-h-12 items-center justify-center rounded-full border border-white/35 bg-white/5 px-6 text-sm font-bold uppercase tracking-[0.06em] text-white transition hover:-translate-y-0.5 hover:bg-white/10">
                            Nhận báo giá ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="about-us" class="bg-slate-950 px-4 py-24 text-white sm:px-6 lg:px-12">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <div class="space-y-6">
                <p class="hero-reveal inline-flex w-fit rounded-full border border-sky-400/25 bg-sky-400/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.12em] text-sky-200">
                    About us
                </p>
                <h2 class="hero-reveal hero-reveal-delay-1 max-w-3xl text-4xl font-extrabold leading-tight tracking-[-0.03em] lg:text-6xl">
                    Trang landing page giới thiệu cơ sở cơ khí có hơn 20 năm kinh nghiệm
                </h2>
                <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-lg leading-8 text-white/78">
                    Cơ Sắt Quốc Tuấn là cơ sở kinh doanh cơ khí chuyên thi công cửa sắt, nhôm, kiếng, cổng, lan can,
                    mái che và các hạng mục gia công theo yêu cầu. Chúng tôi tập trung vào tính bền vững, thẩm mỹ và
                    độ hoàn thiện của từng công trình, phù hợp cho nhà ở, cửa hàng và công trình dân dụng.
                </p>
                <p class="hero-reveal hero-reveal-delay-2 max-w-3xl text-lg leading-8 text-white/78">
                    Với kinh nghiệm hơn 20 năm trong ngành, đội ngũ của chúng tôi hiểu rõ cách tối ưu vật liệu, kết
                    cấu và phong cách thiết kế để mang lại giải pháp đẹp, chắc chắn và đáng tin cậy cho khách hàng.
                </p>

                <div class="hero-reveal hero-reveal-delay-3 flex flex-wrap gap-4 pt-2">
                    <div class="rounded-3xl border border-white/10 bg-white/5 px-6 py-5 backdrop-blur-md">
                        <p class="text-3xl font-extrabold text-sky-300">20+</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.08em] text-white/70">Năm kinh nghiệm</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 px-6 py-5 backdrop-blur-md">
                        <p class="text-3xl font-extrabold text-sky-300">100%</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.08em] text-white/70">Thi công theo yêu cầu</p>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 px-6 py-5 backdrop-blur-md">
                        <p class="text-3xl font-extrabold text-sky-300">Cửa - Nhôm - Kiếng</p>
                        <p class="mt-2 text-sm uppercase tracking-[0.08em] text-white/70">Đa dạng hạng mục</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 translate-x-6 translate-y-6 rounded-[2rem] border border-white/10 bg-sky-500/10"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl backdrop-blur-md">
                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.12em] text-sky-200">Điểm mạnh</p>
                            <h3 class="mt-3 text-3xl font-bold tracking-[-0.02em]">Thiết kế đẹp, thi công chắc, dịch vụ rõ ràng</h3>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div class="rounded-2xl border border-white/10 bg-slate-900/60 px-5 py-4">
                                <p class="text-lg font-semibold">Tư vấn theo nhu cầu thực tế</p>
                                <p class="mt-2 text-sm leading-6 text-white/72">Đề xuất mẫu mã và vật liệu phù hợp với ngân sách, không làm rườm rà quy trình.</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-slate-900/60 px-5 py-4">
                                <p class="text-lg font-semibold">Gia công và lắp đặt trọn gói</p>
                                <p class="mt-2 text-sm leading-6 text-white/72">Tối ưu tiến độ, đảm bảo công trình hoàn thiện đồng bộ từ bản vẽ đến thực tế.</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-slate-900/60 px-5 py-4">
                                <p class="text-lg font-semibold">Phù hợp nhiều hạng mục</p>
                                <p class="mt-2 text-sm leading-6 text-white/72">Cửa sắt, cửa nhôm kính, lan can, cổng, mái che và các sản phẩm cơ khí dân dụng khác.</p>
                            </div>
                        </div>

                        <a href="#bao-gia" class="inline-flex min-h-12 w-fit items-center justify-center rounded-full bg-sky-500 px-6 text-sm font-bold uppercase tracking-[0.06em] text-slate-950 transition hover:-translate-y-0.5 hover:bg-sky-400">
                            Nhận tư vấn ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
