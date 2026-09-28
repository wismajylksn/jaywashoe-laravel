<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Tracking Status - Jaywashoe</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Script Midtrans (Wajib dipertahankan di sini karena load dari server luar) -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    
    <!-- Load CSS dan JS melalui Vite -->
    @vite(['resources/css/tracking.css', 'resources/js/tracking.js'])
</head>
<body>
    <div class="app-container">
        <div class="custom-card">
            <!-- HEADER -->
            <div class="card-header-dark">
                <div class="logo-box">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Jaywashoe" onerror="this.src='https://placehold.co/100x100/ffffff/111827?text=JW'">
                </div>
                <h1 class="brand-title">Nota Pesanan</h1>
            </div>
            
            <div class="card-body-custom">
                <h5 class="mb-4" style="font-weight: 800; color: var(--brand-primary); font-size: 1.25rem; letter-spacing: -0.5px;">
                    Halo, {{ $order->customer_name }} 👋
                </h5>
                
                <!-- RINCIAN LAYANAN -->
                <div class="mb-4">
                    <label class="custom-label">Rincian Layanan</label>
                    <div class="receipt-box">
                        <div class="mb-3">
                            @foreach($order->items as $item)
                                <div class="d-flex justify-content-between mb-3 align-items-center">
                                    <span class="receipt-item">
                                        <span style="color: var(--brand-accent); font-weight: 800; margin-right: 8px; background-color: var(--brand-accent-soft); padding: 4px 8px; border-radius: 6px; font-size: 0.85rem;">{{ $item->quantity }}x</span>
                                        {{ $item->service->name ?? 'Layanan Dihapus' }}
                                    </span>
                                    <span class="receipt-item" style="font-weight: 700;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- BAGIAN DISKON & TOTAL TAGIHAN -->
                        <div class="mt-2">
                            @if($order->discount_amount > 0)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span style="font-weight: 600; font-size: 0.9rem; color: var(--text-muted);">Subtotal Layanan</span>
                                    <span style="font-weight: 700; color: var(--brand-primary); font-size: 0.95rem;">Rp {{ number_format($order->total_amount + $order->discount_amount, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span style="font-weight: 700; font-size: 0.9rem; color: var(--brand-success);">Diskon ({{ $order->promo_code }})</span>
                                    <span style="font-weight: 800; color: var(--brand-success); font-size: 0.95rem;">- Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="receipt-total d-flex justify-content-between align-items-center">
                                <span style="font-weight: 800; font-size: 0.85rem; color: var(--text-muted); letter-spacing: 0.5px;">TOTAL TAGIHAN</span>
                                <span style="font-weight: 800; color: var(--brand-accent); font-size: 1.45rem; letter-spacing: -0.5px;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STATUS SEPATU & ESTIMASI -->
                <div class="mb-4">
                    <label class="custom-label">Status Sepatu</label>
                    @php
                        $statusLabels = [
                            'belum_bayar' => 'Menunggu Pembayaran',
                            'ready_to_pickup' => 'Menunggu Penjemputan',
                            'on_process' => 'Sedang Dicuci (On Process)',
                            'ready_to_delivery' => 'Siap Dikirim / Diambil',
                            'selesai' => 'Pesanan Selesai'
                        ];
                        $statusText = $statusLabels[$order->tracking_status] ?? strtoupper(str_replace('_', ' ', $order->tracking_status));
                    @endphp
                    
                    <div class="status-box">
                        <div class="pulse-dot"></div>
                        <div>
                            <small style="color: var(--text-muted); font-size: 0.8rem; font-weight: 700; display: block; margin-bottom: 2px;">SAAT INI:</small>
                            <h6 style="margin-bottom: 0; font-weight: 800; font-size: 1.05rem; color: var(--brand-primary); letter-spacing: -0.2px;">
                                {{ $statusText }}
                            </h6>
                        </div>
                    </div>

                    @if($order->tracking_status != 'selesai' && $order->tracking_status != 'belum_bayar')
                        <div class="estimasi-box">
                            <div>
                                <small style="color: var(--brand-accent); font-size: 0.75rem; font-weight: 800; display: block; margin-bottom: 2px; letter-spacing: 0.5px;">ESTIMASI SELESAI</small>
                                <span style="font-weight: 800; color: var(--brand-primary); font-size: 1.05rem;">
                                    {{ $order->created_at->addDays(4)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <div style="background-color: white; padding: 10px; border-radius: 12px; box-shadow: var(--shadow-sm);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--brand-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                        </div>
                    @endif
                    <p style="font-size: 0.85rem; color: var(--text-muted); font-style: italic; margin-top: 10px; font-weight: 500; line-height: 1.5;">
                        *Simpan link ini untuk memantau terus status sepatu kesayanganmu!
                    </p>
                </div>

                <!-- PEMBAYARAN -->
                <div>
                    <label class="custom-label">Informasi Pembayaran</label>
                    @if($showPaymentButton)
                        <div class="premium-alert alert-unpaid">
                            <div style="margin-right: 16px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            </div>
                            <div>
                                <strong style="display: block; font-size: 0.95rem; margin-bottom: 2px;">Menunggu Pembayaran</strong>
                                <small style="font-size: 0.85rem; opacity: 0.85; font-weight: 500;">Silakan selesaikan pembayaran pesanan Anda.</small>
                            </div>
                        </div>
                        
                        <!-- Penambahan atribut data-snap-token untuk JS -->
                        <button id="pay-button" class="btn-action" data-snap-token="{{ $snapToken }}">
                            Bayar Sekarang
                        </button>
                    @else
                        <div class="premium-alert alert-paid">
                            <div style="margin-right: 16px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                            <div>
                                <strong style="display: block; font-size: 0.95rem; margin-bottom: 2px;">Pembayaran Lunas</strong>
                                <small style="font-size: 0.85rem; opacity: 0.85; font-weight: 500;">Terima kasih telah mempercayakan Jaywashoe!</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer-text">
            &copy; {{ date('Y') }} Jaywashoe. All rights reserved.
        </div>
    </div>
</body>
</html>