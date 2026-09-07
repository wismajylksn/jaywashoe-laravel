<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaywashoe - Premium Shoe Treatment</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <style>
        :root {
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6;
            --bg-body: #F8FAFC;
            --text-main: #334155;
            --text-muted: #64748B;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }
        .navbar-brand { font-weight: 800; color: var(--brand-primary) !important; }
        .hero-section {
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            color: white;
            padding: 100px 0;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }
        .btn-premium {
            background-color: var(--brand-accent);
            color: #ffffff;
            border-radius: 12px;
            padding: 14px 30px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-premium:hover { background-color: #2563EB; color: white; transform: translateY(-2px); }
        .section-title { font-weight: 800; color: var(--brand-primary); margin-bottom: 30px; }

        /* ===== Promo Section ===== */
        .promo-section {
            position: relative;
            background:
                radial-gradient(circle at top right, rgba(59,130,246,0.06), transparent 55%),
                radial-gradient(circle at bottom left, rgba(15,23,42,0.04), transparent 55%);
        }
        .badge-eyebrow {
            display: inline-block;
            padding: 6px 16px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--brand-accent);
            background: rgba(59,130,246,0.1);
            border-radius: 999px;
        }
        .promo-card {
            position: relative;
            border: none;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            overflow: hidden;
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }
        .promo-card--light {
            background: #ffffff;
            box-shadow: 0 10px 30px -10px rgba(15,23,42,0.08);
        }
        .promo-card--dark {
            background: linear-gradient(155deg, var(--brand-primary) 0%, var(--brand-secondary) 100%);
            box-shadow: 0 15px 35px -8px rgba(15,23,42,0.35);
        }
        .promo-card:hover { transform: translateY(-8px); }
        .promo-card--light:hover { box-shadow: 0 20px 40px -10px rgba(59,130,246,0.18); }
        .promo-card--dark:hover { box-shadow: 0 20px 45px -8px rgba(15,23,42,0.45); }

        .promo-ribbon {
            position: absolute;
            top: 18px;
            right: -34px;
            transform: rotate(45deg);
            background: var(--brand-accent);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 5px 40px;
            box-shadow: 0 4px 10px rgba(59,130,246,0.3);
        }
        .promo-ribbon--accent {
            background: linear-gradient(90deg, #F5B400, #FF8A00);
            box-shadow: 0 4px 10px rgba(255,138,0,0.35);
        }

        .promo-icon-wrap {
            width: 84px;
            height: 84px;
            margin: 0 auto 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(59,130,246,0.1);
        }
        .promo-card--dark .promo-icon-wrap { background: rgba(255,255,255,0.08); }
        .promo-icon { font-size: 2.2rem; line-height: 1; }

        .promo-title { font-weight: 700; margin-bottom: 0.6rem; color: var(--brand-primary); }
        .promo-desc { color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.5rem; min-height: 44px; }

        .promo-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--brand-accent);
            text-decoration: none;
            transition: gap 0.25s ease;
        }
        .promo-cta:hover { gap: 10px; color: #2563EB; }
        .promo-cta--light { color: #fff; }
        .promo-cta--light:hover { color: #F5B400; }
        /* ===== End Promo Section ===== */
        
        /* Custom Carousel Styling untuk Screenshot */
        .testi-img-wrapper {
            background-color: #E2E8F0;
            border-radius: 24px;
            padding: 20px;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .testi-img-wrapper img {
            max-height: 100%;
            width: auto;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: var(--brand-primary);
            border-radius: 50%;
            padding: 20px;
        }

        /* Floating WhatsApp Button */
        .float-wa {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #25D366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }
        .float-wa:hover {
            transform: scale(1.1);
            color: white;
        }
        /* ===== Alamat Section ===== */
        .address-card {
            background: var(--bg-body);
            border-radius: 20px;
            padding: 2.25rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            box-shadow: 0 10px 30px -12px rgba(15,23,42,0.08);
        }
        .address-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }
        .address-icon {
            flex-shrink: 0;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: rgba(59,130,246,0.1);
            color: var(--brand-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px -12px rgba(15,23,42,0.1);
            min-height: 350px;
        }
        .map-wrapper iframe { display: block; }
        /* ===== End Alamat Section ===== */
    </style>
</head>
<body>

    <!-- URL WhatsApp Admin (Ganti dengan nomor asli Anda) -->
    @php
        $waAdminUrl = "https://wa.me/6285555552353?text=Halo%20Admin%20Jaywashoe,%20saya%20ingin%20bertanya%20tentang%20layanan%20cuci%20sepatu.";
    @endphp

    <!-- Navbar -->
                <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 sticky-top">
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Jaywashoe Logo" style="height: 32px; width: auto;">
                Jaywashoe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link fw-medium" href="#promo">Promo</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium" href="#testimoni">Testimoni</a></li>
                     <li class="nav-item"><a class="nav-link fw-medium" href="#alamat">Lokasi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <span class="badge bg-primary bg-opacity-25 text-white mb-3 px-3 py-2 rounded-pill">Perawatan Sepatu Premium</span>
                    <h1 class="display-4 fw-bold mb-3">Langkah Bersih, Tampil Percaya Diri.</h1>
                    <p class="lead text-white-50 mb-4">Layanan Premium Tanpa Repot: Bersih, Wangi, Antar-Jemput Gratis.</p>
                    <a href="{{ $waAdminUrl }}" target="_blank" class="btn btn-premium btn-lg shadow" style="background-color: #22be5bc7;">Konsultasi & Pesan via WA &rarr;</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=600&q=80" alt="Shoe Cleaning" class="img-fluid rounded-4 shadow-lg" style="transform: rotate(3deg);">
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section id="promo" class="py-5 mt-4 promo-section">
        <div class="container py-4">
            <div class="text-center mb-5">
                <!-- <span class="badge-eyebrow">Penawaran Terbatas</span> -->
                <h2 class="section-title mt-2">Promo Spesial</h2>
                <p class="text-muted">Jangan lewatkan penawaran menarik dari Jaywashoe!</p>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- Promo Item 1 -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="promo-card promo-card--light h-100">
                        <div class="promo-ribbon">20% OFF</div>
                        <div class="promo-icon-wrap">
                            <span class="promo-icon">🎉</span>
                        </div>
                        <h4 class="promo-title">Diskon 20% Pelanggan Baru</h4>
                        <p class="promo-desc">Klaim promo ini saat menghubungi admin via WhatsApp.</p>
                        <a href="{{ $waAdminUrl }}" target="_blank" class="promo-cta">
                            Klaim Sekarang <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div> -->

                <!-- Promo Item 2 (highlight/featured) -->
                <div class="col-md-6 col-lg-4">
                <div class="promo-card promo-card--light h-100">
                    <div class="promo-ribbon">GRATIS</div>
                    <div class="promo-icon-wrap">
                        <span class="promo-icon">🧴</span>
                    </div>
                    <h4 class="promo-title">Gratis Parfum</h4>
                    <p class="promo-desc">Setiap cuci 2 pasang sepatu, dapatkan parfum anti bakteri gratis.</p>
                    <a href="{{ $waAdminUrl }}" target="_blank" class="promo-cta">
                        Klaim Sekarang <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

                <!-- Promo Item 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="promo-card promo-card--light h-100">
                        <div class="promo-ribbon">GRATIS</div>
                        <div class="promo-icon-wrap">
                            <span class="promo-icon">🚚</span>
                        </div>
                        <h4 class="promo-title">Gratis Antar Jemput</h4>
                        <p class="promo-desc">Minimal transaksi Rp50.000 untuk area sekitar toko.</p>
                        <a href="{{ $waAdminUrl }}" target="_blank" class="promo-cta">
                            Klaim Sekarang <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonial Section (Gambar Screenshot) -->
    <section id="testimoni" class="py-5 bg-white">
        <div class="container py-4">
            <h2 class="section-title text-center mb-5">Kepercayaan Pelanggan Kami</h2>
            
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">
                        
                        <div class="carousel-indicators" style="bottom: -50px;">
                            <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="0" class="active bg-dark"></button>
                            <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="1" class="bg-dark"></button>
                            <button type="button" data-bs-target="#testimoniCarousel" data-bs-slide-to="2" class="bg-dark"></button>
                        </div>

                        <div class="carousel-inner shadow-sm rounded-4">
                            
                            <div class="carousel-item active">
                                <div class="testi-img-wrapper">
                                    <img src="{{ asset('images/testi-1.png') }}" alt="Screenshot Testimoni 1">
                                </div>
                            </div>
                            
                            <div class="carousel-item">
                                <div class="testi-img-wrapper">
                                    <img src="{{ asset('images/testi-2.png') }}" alt="Screenshot Testimoni 2">
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="testi-img-wrapper">
                                    <img src="{{ asset('images/testi-3.png') }}" alt="Screenshot Testimoni 3">
                                </div>
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev" style="width: 10%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next" style="width: 10%;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>

        <!-- Alamat / Lokasi Section -->
    <section id="alamat" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <!-- <span class="badge-eyebrow">Kunjungi Kami</span> -->
                <h2 class="section-title mt-2">Lokasi Toko</h2>
                <p class="text-muted">Datang langsung atau gunakan layanan antar-jemput kami.</p>
            </div>

            <div class="row g-4 align-items-stretch justify-content-center">

                <!-- Info Alamat -->
                <div class="col-lg-5">
                    <div class="address-card h-100">
                        <div class="address-item">
                            <div class="address-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Alamat</h6>
                                <p class="text-muted mb-0">
                                    Jl. H.Mandor Salim No.07, RT.5/RW.2, Srengseng,<br>
                                    Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11630
                                </p>
                            </div>
                        </div>

                        <div class="address-item">
                            <div class="address-icon">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Jam Operasional</h6>
                                <p class="text-muted mb-0">
                                    Senin - Sabtu: 14.00 - 24.00<br>
                                    Minggu Tutup
                                </p>
                            </div>
                        </div>

                        <div class="address-item">
                            <!-- <div class="address-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Hubungi Kami</h6>
                                <p class="text-muted mb-0">+62 855-5555-2353</p>
                            </div> -->
                        </div>

                        <!-- <a href="{{ $waAdminUrl }}" target="_blank" class="btn btn-premium w-100 mt-2">
                            Chat via WhatsApp <i class="bi bi-arrow-right ms-1"></i>
                        </a> -->
                    </div>
                </div>

                <!-- Map Embed -->
                <div class="col-lg-6">
                    <div class="map-wrapper h-100">
                        <iframe
                            src="https://www.google.com/maps?q=-6.2032467,106.7558971&z=17&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0; min-height:350px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white-50 py-4 text-center mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Jaywashoe. All rights reserved.</p>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="{{ $waAdminUrl }}" target="_blank" class="float-wa">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c-.003 1.396.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c.004-3.621 2.952-6.57 6.57-6.572 1.755.001 3.406.685 4.646 1.926a6.571 6.571 0 0 1 1.92 4.643c-.004 3.62-2.951 6.57-6.57 6.572zm3.605-4.92c-.198-.1-1.173-.578-1.353-.646-.18-.068-.312-.1-.444.1-.132.2-.511.646-.627.778-.115.132-.23.15-.428.05-.198-.1-.837-.308-1.594-.984-.588-.52-.985-1.163-1.103-1.362-.118-.2-.013-.307.086-.405.089-.089.198-.231.297-.346.1-.116.132-.198.198-.33.066-.132.033-.248-.016-.347-.05-.1-.444-1.071-.608-1.468-.16-.39-.32-.337-.444-.343-.12-.005-.255-.005-.387-.005-.132 0-.347.05-.528.248-.18.2-.686.671-.686 1.637 0 .966.702 1.898.8 2.03.1.132 1.386 2.115 3.358 2.964.469.202.835.323 1.121.413.47.15.898.128 1.236.078.377-.056 1.173-.479 1.338-.942.164-.463.164-.86.115-.942-.05-.082-.18-.132-.378-.23z"/>
        </svg>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>