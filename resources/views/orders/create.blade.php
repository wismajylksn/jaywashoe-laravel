<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- WAJIB: Meta CSRF Token agar API Pengecek Promo diizinkan oleh Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pesan Layanan - Jaywashoe</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Memanggil CSS dan JS khusus halaman Order melalui Vite -->
    @vite(['resources/css/order.css', 'resources/js/order.js'])
</head>
<body>
    <div class="app-container">
        <div class="custom-card">
            <div class="card-header-dark">
                <div class="logo-box">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Jaywashoe" onerror="this.src='https://placehold.co/100x100/ffffff/111827?text=JW'">
                </div>
                <h1 class="brand-title">Jaywashoe</h1>
                <p class="brand-subtitle">Premium Shoe Treatment</p>
            </div>
            
            <div class="card-body-custom">
                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 mb-4" style="font-size: 0.85rem; border: none; background-color: #FEF2F2; color: #EF4444; font-weight: 600;">
                        <ul class="mb-0 px-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <input type="text" name="honeypot_bot_trap" style="display:none" autocomplete="off">
                    <div>
                        <label class="custom-label">Nama Lengkap</label>
                        <input type="text" name="customer_name" class="custom-input" required placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label class="custom-label">No. WhatsApp</label>
                        <input type="tel" name="customer_phone" class="custom-input" required placeholder="Contoh: 08123456789">
                    </div>
                    <div>
                        <label class="custom-label">Pilih Layanan</label>
                        <button type="button" class="custom-input btn-trigger-modal" data-bs-toggle="modal" data-bs-target="#serviceModal">
                            <span id="serviceTriggerText" style="color: #94A3B8; font-weight: 500;">-- Pilih jenis perawatan --</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                    </div>
                    
                    <!-- BAGIAN PROMO -->
                    <div class="mb-2">
                        <label class="custom-label">Punya Kode Promo?</label>
                        <div class="promo-wrapper">
                            <input type="text" id="promoCodeInput" name="promo_code" class="custom-input" placeholder="Masukkan kode" style="text-transform: uppercase; font-family: monospace; font-size: 1rem; letter-spacing: 1px;">
                            <button type="button" id="applyPromoBtn" class="btn-promo">Terapkan</button>
                        </div>
                        <small id="promoMessage" class="d-block mb-3 fw-bold" style="font-size: 0.8rem;"></small>
                    </div>
                    
                    <!-- RINCIAN TAGIHAN CERDAS -->
                    <div id="billingBox" class="billing-box">
                        <div class="billing-row" style="color: var(--text-muted);">
                            <span>Subtotal Layanan</span>
                            <span id="subtotalText" class="fw-bold" style="color: var(--brand-primary);">Rp 0</span>
                        </div>
                        <div id="discountRow" class="billing-row" style="color: var(--brand-success); display: none;">
                            <span>Diskon <span id="discountBadge" class="badge-soft-success ms-1"></span></span>
                            <span id="discountAmountText" class="fw-bold">- Rp 0</span>
                        </div>
                        <hr style="border-color: #CBD5E1; margin: 16px 0; border-style: dashed;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold" style="font-size: 0.9rem; color: var(--brand-primary); text-transform: uppercase; letter-spacing: 0.5px;">Total Tagihan</span>
                            <div>
                                <span id="originalTotalText" class="text-strike" style="display: none;">Rp 0</span>
                                <span id="finalTotalText" class="fw-bold" style="font-size: 1.45rem; color: var(--brand-accent); letter-spacing: -0.5px;">Rp 0</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal Pilih Layanan -->
                    <div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content" style="border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-lg);">
                                <div class="modal-header" style="border-bottom: 1px solid var(--border-color); padding: 20px 24px;">
                                    <h5 class="modal-title fw-bold" style="color: var(--brand-primary); font-size: 1.15rem;">Pilih Layanan</h5>
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body" style="padding: 24px; background-color: #F8FAFC;">
                                    @foreach($services as $service)
                                        <div class="service-option d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1 fw-bold" style="color: var(--brand-primary); font-size: 1rem;">{{ $service->name }}</p>
                                                <p class="mb-0" style="font-size: 0.85rem; color: var(--brand-accent); font-weight: 700;">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn-qty btn-qty-minus">-</button>
                                                <input type="number" name="items[{{ $service->id }}]" value="0" min="0" data-price="{{ $service->price }}" class="form-control text-center mx-1 qty-input" style="width: 45px; border: none; background: transparent; font-weight: 800; color: var(--brand-primary); padding: 0; font-size: 1.1rem;" readonly>
                                                <button type="button" class="btn-qty btn-qty-plus">+</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal-footer" style="border-top: none; padding: 16px 24px 24px; background-color: #F8FAFC;">
                                    <button type="button" class="btn-action w-100" style="margin-top:0; padding: 14px;" data-bs-dismiss="modal">Simpan Pilihan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" id="submitBtn" class="btn-action">
                        Buat Pesanan & Bayar
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-text">
            &copy; {{ date('Y') }} Jaywashoe. All rights reserved.
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>