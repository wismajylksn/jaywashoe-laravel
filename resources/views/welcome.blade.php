<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Jaywashoe - Cuci Sepatu Premium</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600&display=swap" rel="stylesheet">
    
    <!-- Memanggil CSS dan JS eksternal melalui Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="antialiased font-sans selection:bg-brand-teal selection:text-white">

    <!-- Top Banner Lembut -->
    <div class="bg-brand-teal text-white text-[11px] sm:text-xs font-medium tracking-wide text-center py-2.5 px-4">
        Dapatkan diskon 15% untuk pelanggan baru! <a href="https://wa.me/628123456789" class="underline ml-1 font-bold hover:text-brand-mustard transition-colors">Klaim Promo</a>
    </div>

    <!-- Floating Navbar Profesional -->
    <div class="relative w-full z-50 flex flex-col items-center px-4 mt-4 md:mt-6 mb-8">
        <nav class="w-full max-w-5xl bg-white/90 backdrop-blur-md border border-gray-100 rounded-full py-2.5 px-5 md:px-6 flex justify-between items-center shadow-glass transition-all duration-300 relative z-20">
            <!-- Logo Maskot Jaywashoe -->
            <a href="#" class="flex items-center group gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Jaywashoe Logo" class="h-10 md:h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105" onerror="this.src='https://placehold.co/100x100/F9F7F1/1E2322?text=Logo'">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex gap-8 items-center text-[14px] font-semibold text-brand-muted">
                <a href="#beranda" class="hover:text-brand-teal transition-colors duration-300">Beranda</a>
                <a href="#tentang" class="hover:text-brand-teal transition-colors duration-300">Tentang</a>
                <a href="#layanan" class="hover:text-brand-teal transition-colors duration-300">Layanan</a>
                <a href="#galeri" class="hover:text-brand-teal transition-colors duration-300">Galeri</a>
            </div>

            <!-- CTA Order -->
            <a href="{{ route('order.create') }}" class="hidden md:inline-block bg-brand-teal text-white px-7 py-2.5 font-bold text-sm rounded-full shadow-soft hover:shadow-float hover:-translate-y-0.5 transition-all duration-300">
                Pesan Layanan
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" class="md:hidden text-brand-dark p-2 focus:outline-none rounded-full hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </nav>

        <!-- Dropdown Mobile Menu Clean -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full px-4 pt-3 z-10">
            <div class="bg-white border border-gray-100 rounded-3xl shadow-glass flex flex-col p-6 gap-3 text-center font-semibold text-brand-dark">
                <a href="#beranda" class="mobile-link py-2.5 border-b border-gray-50 hover:text-brand-teal transition-colors">Beranda</a>
                <a href="#tentang" class="mobile-link py-2.5 border-b border-gray-50 hover:text-brand-teal transition-colors">Tentang</a>
                <a href="#layanan" class="mobile-link py-2.5 border-b border-gray-50 hover:text-brand-teal transition-colors">Layanan</a>
                <a href="#galeri" class="mobile-link py-2.5 border-b border-gray-50 hover:text-brand-teal transition-colors">Galeri</a>
                <a href="{{ route('order.create') }}" class="mt-3 bg-brand-teal text-white px-6 py-3.5 rounded-full hover:shadow-float transition-all text-sm shadow-soft">Pesan Sekarang</a>
            </div>
        </div>
    </div>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative pt-4 pb-12 md:pt-0 md:pb-20 px-6 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none opacity-40">
            <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[60%] rounded-full bg-brand-teal/20 blur-[100px]"></div>
            <div class="absolute top-[20%] right-[5%] w-[40%] h-[50%] rounded-full bg-brand-mustard/15 blur-[100px]"></div>
        </div>
        <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-10 items-center">
            <!-- Kolom Kiri: Tipografi & Trust Signals -->
            <div class="text-center lg:text-left pt-2 md:pt-0">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 mb-6 rounded-full bg-white/60 backdrop-blur-sm border border-gray-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-teal animate-pulse"></span>
                    <span class="text-[10px] md:text-xs font-bold tracking-widest text-brand-dark uppercase">Premium Shoe Treatment</span>
                </div>
                <h1 class="font-serif text-5xl md:text-6xl lg:text-[4.5rem] font-bold text-brand-dark mb-6 tracking-tight leading-[1.1]">
                    Kembalikan <br class="hidden lg:block"/> pesona <span class="relative inline-block text-brand-teal italic font-medium"> sepatu kesayanganmu. </span>
                </h1>
                <p class="text-brand-muted md:text-lg mb-8 max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed">
                    Kami merawat, membersihkan, dan mereparasi sepatu Anda dengan teknik profesional, material premium, dan sentuhan klasik.
                </p>
                <div class="flex items-center justify-center lg:justify-start gap-3 mb-10">
                    <div class="flex text-brand-mustard text-lg">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <span class="text-sm font-semibold text-brand-dark">Dipercaya 100+ pelanggan</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center">
                    <a href="{{ route('order.create') }}" class="w-full sm:w-auto bg-brand-dark text-white px-8 py-4 font-bold rounded-full shadow-soft hover:shadow-float hover:-translate-y-1 transition-all duration-300 text-center flex justify-center items-center gap-2">
                        Buat Pesanan
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a href="#layanan" class="w-full sm:w-auto bg-white text-brand-dark px-8 py-4 font-bold rounded-full border border-gray-200 hover:border-brand-teal hover:text-brand-teal transition-all duration-300 text-center shadow-sm">
                        Lihat Layanan
                    </a>
                </div>
            </div>
            <!-- Kolom Kanan: Visual -->
            <div class="px-2 md:px-8 lg:px-0 relative">
                <div class="relative w-full aspect-[4/3] lg:aspect-square max-w-md mx-auto lg:max-w-full lg:ml-auto">
                    <div class="absolute inset-0 bg-white rounded-[2rem] border border-gray-100 shadow-float z-10 overflow-hidden flex items-center justify-center p-2.5">
                        <img src="{{ asset('images/depan.png') }}" alt="Proses Cuci Sepatu" class="w-full h-full object-cover rounded-[1.5rem]" onerror="this.src='https://placehold.co/800x800/E2E8F0/64748B?text=Foto+Proses+Cuci+Sepatu'">
                        <div class="absolute bottom-6 -left-4 lg:-left-8 bg-white/95 backdrop-blur-sm border border-gray-100 rounded-2xl p-4 shadow-glass flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div class="w-12 h-12 rounded-full bg-brand-teal/10 flex items-center justify-center text-brand-teal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
                            </div>
                            <div class="text-left pr-2">
                                <div class="text-xs font-bold text-brand-muted uppercase tracking-wider">Garansi</div>
                                <div class="text-sm font-extrabold text-brand-dark">Cuci Ulang 100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MENGAPA MEMILIH KAMI (Features) -->
    <section id="tentang" class="py-12 px-6 md:px-12 bg-white relative">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-serif text-3xl md:text-5xl font-bold text-brand-dark mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-brand-muted max-w-2xl mx-auto font-medium text-base md:text-lg">Pelayanan sepenuh hati dengan standar kebersihan dan material premium untuk sepatu kesayangan Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Fitur 1 -->
                <div class="p-8 rounded-3xl bg-brand-paper/50 border border-gray-100 hover:bg-white hover:shadow-soft transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center mb-6 text-brand-teal border border-gray-100 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3 text-brand-dark">Garansi Cuci</h3>
                    <p class="text-brand-muted font-medium text-sm leading-relaxed">Hasil kurang memuaskan? Kami cuci ulang tanpa tambahan biaya sepeserpun.</p>
                </div>
                <!-- Fitur 2 -->
                <div class="p-8 rounded-3xl bg-brand-paper/50 border border-gray-100 hover:bg-white hover:shadow-soft transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center mb-6 text-brand-mustard border border-gray-100 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3 text-brand-dark">Konsultasi Ahli</h3>
                    <p class="text-brand-muted font-medium text-sm leading-relaxed">Tanya langsung mengenai material dan teknik cuci yang aman sebelum treatment.</p>
                </div>
                <!-- Fitur 3 -->
                <div class="p-8 rounded-3xl bg-brand-paper/50 border border-gray-100 hover:bg-white hover:shadow-soft transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center mb-6 text-brand-red border border-gray-100 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3 text-brand-dark">Antar Jemput</h3>
                    <p class="text-brand-muted font-medium text-sm leading-relaxed">Layanan jemput dan antar sepatu ke depan pintu rumah Anda dengan aman.</p>
                </div>
                <!-- Fitur 4 -->
                <div class="p-8 rounded-3xl bg-brand-paper/50 border border-gray-100 hover:bg-white hover:shadow-soft transition-all duration-300 group">
                    <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center mb-6 text-brand-dark border border-gray-100 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3 text-brand-dark">Kualitas Terjaga</h3>
                    <p class="text-brand-muted font-medium text-sm leading-relaxed">Pengerjaan teliti oleh profesional menggunakan sabun (cleaner) khusus sepatu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN KAMI -->
    <section id="layanan" class="py-12 px-6 md:px-12 bg-[#f4f2eb]">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
                <div class="max-w-xl">
                    <h2 class="font-serif text-3xl md:text-5xl font-bold text-brand-dark mb-4">Layanan Kami</h2>
                    <p class="text-brand-muted font-medium text-base md:text-lg">Perawatan khusus yang disesuaikan dengan kebutuhan dan material sepatu Anda.</p>
                </div>
                <a href="{{ route('order.create') }}" class="inline-flex items-center gap-2 text-brand-teal font-bold hover:text-brand-dark transition-colors text-base border-b-2 border-brand-teal hover:border-brand-dark pb-0.5">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card Fast Cleaning -->
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-float transition-all duration-300">
                    <div class="relative w-full h-56 overflow-hidden bg-gray-100 p-2">
                        <img src="{{ asset('images/fast.png') }}" alt="Fast Cleaning" class="w-full h-full object-cover rounded-3xl img-hover-zoom" onerror="this.src='https://placehold.co/600x400/E2E8F0/64748B?text=Fast+Cleaning'">
                    </div>
                    <div class="p-8">
                        <h3 class="font-serif text-2xl font-bold mb-3 text-brand-dark">Fast Cleaning</h3>
                        <p class="text-brand-muted font-medium text-sm leading-relaxed mb-0"> Pembersihan instan bagian upper dan midsole. Cocok untuk sepatu harian yang butuh penyegaran cepat. Bisa ditunggu. </p>
                    </div>
                </div>
                <!-- Card Deep Cleaning -->
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-float transition-all duration-300">
                    <div class="relative w-full h-56 overflow-hidden bg-gray-100 p-2">
                        <img src="{{ asset('images/deep.png') }}" alt="Deep Cleaning" class="w-full h-full object-cover rounded-3xl img-hover-zoom" onerror="this.src='https://placehold.co/600x400/E2E8F0/64748B?text=Deep+Cleaning'">
                    </div>
                    <div class="p-8">
                        <h3 class="font-serif text-2xl font-bold mb-3 text-brand-dark">Deep Cleaning</h3>
                        <p class="text-brand-muted font-medium text-sm leading-relaxed mb-0"> Pencucian detail menyeluruh (outsole, midsole, insole, upper, tali) menggunakan sabun premium khusus material sepatu. </p>
                    </div>
                </div>
                <!-- Card Unyellowing -->
                <div class="group bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-float transition-all duration-300">
                    <div class="relative w-full h-56 overflow-hidden bg-gray-100 p-2">
                        <img src="{{ asset('images/unyellowing.png') }}" alt="Unyellowing" class="w-full h-full object-cover rounded-3xl img-hover-zoom" onerror="this.src='https://placehold.co/600x400/E2E8F0/64748B?text=Unyellowing'">
                    </div>
                    <div class="p-8">
                        <h3 class="font-serif text-2xl font-bold mb-3 text-brand-dark">Unyellowing</h3>
                        <p class="text-brand-muted font-medium text-sm leading-relaxed mb-0"> Treatment khusus menghilangkan noda kuning oksidasi pada midsole karet. Membuat sol menguning kembali putih cerah. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI INFINITE SCROLL -->
    <section id="galeri" class="py-12 bg-white overflow-hidden">
        <div class="text-center mb-12 px-6">
            <h2 class="font-serif text-3xl md:text-5xl font-bold text-brand-dark mb-4">Hasil Karya Kami</h2>
            <p class="text-brand-muted font-medium text-base md:text-lg max-w-xl mx-auto">Melihat langsung keajaiban dari tangan-tangan ahli kami.</p>
        </div>
        <div class="marquee-wrapper relative w-full flex overflow-hidden fade-edges py-6">
            <div class="animate-marquee min-w-max items-center" style="animation-play-state: running !important;">
                <img src="{{ asset('images/beforeafter1.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+1'">
                <img src="{{ asset('images/beforeafter2.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/F1F5F9/64748B?text=Karya+2'">
                <img src="{{ asset('images/beforeafter3.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+3'">
                <img src="{{ asset('images/beforeafter4.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/F1F5F9/64748B?text=Karya+4'">
                <img src="{{ asset('images/beforeafter5.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+5'">
            </div>
            <div class="animate-marquee min-w-max items-center" aria-hidden="true" style="animation-play-state: running !important;">
                <img src="{{ asset('images/beforeafter1.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+1'">
                <img src="{{ asset('images/beforeafter2.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/F1F5F9/64748B?text=Karya+2'">
                <img src="{{ asset('images/beforeafter3.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+3'">
                <img src="{{ asset('images/beforeafter4.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/F1F5F9/64748B?text=Karya+4'">
                <img src="{{ asset('images/beforeafter5.png') }}" alt="Gallery" class="w-64 md:w-80 h-[28rem] object-cover rounded-3xl shadow-soft hover:shadow-float transition-all duration-300" onerror="this.src='https://placehold.co/400x600/E2E8F0/64748B?text=Karya+5'">
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION (CTA) -->
    <section class="py-16 md:py-20 bg-brand-dark text-center flex flex-col items-center justify-center px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent"></div>
        <div class="max-w-2xl relative z-10">
            <h2 class="font-serif text-3xl md:text-5xl font-bold text-white tracking-tight mb-6 leading-tight"> Sepatumu butuh sentuhan magis? </h2>
            <p class="text-white/80 text-base md:text-lg mb-10 font-medium"> Kirim pesan ke tim ahli kami atau jadwalkan layanan antar-jemput secara gratis di wilayah terdekat Anda. </p>
            <a href="https://wa.me/628123456789" class="inline-flex items-center gap-3 bg-white text-brand-dark font-bold px-8 py-4 rounded-full shadow-soft hover:shadow-float hover:-translate-y-1 hover:bg-brand-paper transition-all duration-300 text-sm md:text-base">
                Hubungi via WhatsApp
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </section>

    <!-- FOOTER ELEGAN -->
    <footer class="bg-white text-brand-dark pt-16 pb-8 px-6 border-t border-gray-100">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10 md:gap-12 mb-16">
            <div class="md:col-span-5">
                <a href="#" class="inline-block mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="Jaywashoe Logo" class="h-12 w-auto object-contain" onerror="this.src='https://placehold.co/100x100/F9F7F1/1E2322?text=Logo'">
                </a>
                <p class="font-medium text-sm leading-relaxed max-w-sm text-brand-muted">
                    Layanan cuci dan perawatan sepatu premium dengan metode teruji yang dipadukan dengan standar kebersihan modern.
                </p>
            </div>
            <div class="md:col-span-3">
                <h4 class="font-bold text-brand-dark mb-6 tracking-wider uppercase text-xs">Hubungi Kami</h4>
                <div class="flex flex-col gap-4 font-medium text-sm text-brand-muted">
                    <p class="flex items-center gap-3 hover:text-brand-teal transition-colors cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        +62 812 3456 7890
                    </p>
                    <p class="flex items-center gap-3 hover:text-brand-teal transition-colors cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        +62 898 7654 3210
                    </p>
                </div>
            </div>
            <div class="md:col-span-4">
                <h4 class="font-bold text-brand-dark mb-6 tracking-wider uppercase text-xs">Workshop</h4>
                <p class="font-medium text-sm leading-relaxed max-w-xs text-brand-muted">
                    Jl. Sepatu Kaca No. 99, Kel. Mulus, Kec. Bersih, Jakarta Selatan, 12345
                </p>
            </div>
        </div>
        <div class="max-w-6xl mx-auto border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 font-semibold text-xs text-brand-muted">
            <p>&copy; {{ date('Y') }} Jaywashoe. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-brand-teal transition-colors uppercase tracking-wider">Instagram</a>
                <a href="#" class="hover:text-brand-teal transition-colors uppercase tracking-wider">TikTok</a>
            </div>
        </div>
    </footer>
</body>
</html>