<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Status - Jaywashoe</title>
    
    <!-- Google Fonts: Plus Jakarta Sans for a premium, modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Script Midtrans Snap (Pertahankan logic asli) -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <style>
        /* CSS Variables for Premium Theme */
        :root {
            --brand-primary: #0F172A; /* Deep Navy */
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6; /* Blue Accent */
            --bg-body: #F8FAFC;
            --text-main: #334155;
            --text-muted: #64748B;
            --surface-color: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Premium Card Styling */
        .premium-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
            background: var(--surface-color);
            overflow: hidden;
        }

        /* Modern Header */
        .card-header-custom {
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            padding: 35px 20px 30px;
            text-align: center;
            border-bottom: none;
            position: relative;
        }

        .brand-logo-wrapper {
            width: 56px;
            height: 56px;
            background-color: #ffffff;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .brand-title {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin: 0;
        }
        
        .brand-subtitle {
            color: #94A3B8;
            font-size: 0.85rem;
            margin-top: 4px;
            font-weight: 400;
        }

        /* Order Summary Box */
        .order-summary {
            background-color: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .summary-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .summary-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--brand-primary);
        }

        /* Tracking Status Live Box */
        .status-box {
            background: linear-gradient(to right, #EFF6FF, #F8FAFC);
            border-left: 4px solid var(--brand-accent);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        /* Pulsing dot for "Live" feel */
        .pulse-dot {
            width: 12px;
            height: 12px;
            background-color: var(--brand-accent);
            border-radius: 50%;
            margin-right: 16px;
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        /* Payment Alerts Styling */
        .premium-alert {
            border-radius: 16px;
            padding: 20px;
            border: none;
            display: flex;
            align-items: center;
        }
        
        .alert-unpaid {
            background-color: #FFFBEB;
            color: #92400E;
            border: 1px solid #FEF3C7;
        }
        
        .alert-paid {
            background-color: #F0FDF4;
            color: #166534;
            border: 1px solid #DCFCE7;
        }

        /* Premium Button */
        .btn-premium {
            background-color: var(--brand-primary);
            color: #ffffff;
            border-radius: 14px;
            padding: 16px;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: none;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2);
            transition: all 0.3s ease;
        }

        .btn-premium:hover, .btn-premium:focus {
            background-color: var(--brand-secondary);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.25);
        }

        .btn-premium:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.2);
        }

        @media (max-width: 576px) {
            .container { padding-left: 1rem; padding-right: 1rem; }
            .card-body { padding: 1.5rem !important; }
        }
    </style>
</head>
<body>

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            
            <div class="card premium-card">
                <!-- Modern Header -->
                <div class="card-header-custom">
                    <div class="brand-logo-wrapper">
                        <!-- Location/Tracking Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--brand-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="10" r="3"/>
                            <path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 7 8 11.7z"/>
                        </svg>
                    </div>
                    <h5 class="brand-title">Detail & Lacak Pesanan</h5>
                    <p class="brand-subtitle">Jaywashoe Premium Treatment</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <!-- 1. IDENTITAS PESANAN (Receipt Style) -->
                    <h5 class="mb-4" style="font-weight: 700; color: var(--brand-primary);">
                        Halo, {{ $order->customer_name }} 👋
                    </h5>
                    
                    <div class="order-summary d-flex justify-content-between align-items-center">
                        <div>
                            <div class="summary-label">Layanan</div>
                            <div class="summary-value">{{ $order->service_type }}</div>
                        </div>
                        <div class="text-end">
                            <div class="summary-label">Total Tagihan</div>
                            <div class="summary-value" style="color: var(--brand-accent);">
                                Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <!-- 2. STATUS TRACKING SEPATU (Live Indicator) -->
                    <div class="mb-4">
                        <div class="summary-label mb-3">Status Pengerjaan Sepatu</div>
                        
                        <div class="status-box">
                            <div class="pulse-dot"></div>
                            <div>
                                <small class="text-muted d-block mb-1" style="font-size: 0.8rem;">Saat ini:</small>
                                <h6 class="mb-0 fw-bold" style="color: var(--brand-primary); letter-spacing: 0.5px;">
                                    {{ strtoupper($order->tracking_status) }}
                                </h6>
                            </div>
                        </div>
                        <p class="text-muted" style="font-size: 0.85rem; line-height: 1.5;">
                            * Simpan atau <i>bookmark</i> halaman ini untuk mengecek pembaruan status sepatu Anda secara berkala.
                        </p>
                    </div>

                    <hr style="border-color: #E2E8F0; margin: 24px 0;">

                    <!-- 3. LOGIKA TOMBOL PEMBAYARAN -->
                    <div class="payment-section">
                        @if($showPaymentButton)
                            <!-- Tampil jika payment_status = 'unpaid' -->
                            <div class="premium-alert alert-unpaid mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <div>
                                    <strong class="d-block" style="font-size: 0.95rem;">Menunggu Pembayaran</strong>
                                    <small>Silakan selesaikan pembayaran Anda.</small>
                                </div>
                            </div>
                            
                            <button id="pay-button" class="btn btn-premium w-100 d-flex justify-content-center align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                Bayar Sekarang
                            </button>
                        @else
                            <!-- Tampil jika payment_status = 'paid' -->
                            <div class="premium-alert alert-paid mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-3"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <div>
                                    <strong class="d-block" style="font-size: 0.95rem;">Pembayaran Lunas</strong>
                                    <small>Terima kasih telah mempercayakan Jaywashoe!</small>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <!-- Clean footer mark -->
            <div class="text-center mt-4">
                <small style="color: #94A3B8; font-weight: 500;">&copy; {{ date('Y') }} Jaywashoe. All rights reserved.</small>
            </div>

        </div>
    </div>
</div>

<!-- Logika JS Midtrans (Utuh seperti asli) -->
<script>
    const payButton = document.getElementById('pay-button');

    // Pastikan tombol ada di halaman (mencegah error jika status sudah Lunas)
    if (payButton) {
        payButton.addEventListener('click', function () {
            // Panggil fungsi snap.pay menggunakan token dari Controller
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!"); 
                    // Reload halaman agar status pembayaran berubah (sementara sebelum Webhook aktif)
                    window.location.reload(); 
                },
                onPending: function(result){
                    alert("Menunggu pembayaran Anda!"); console.log(result);
                },
                onError: function(result){
                    alert("Pembayaran gagal!"); console.log(result);
                },
                onClose: function(){
                    alert("Anda menutup popup sebelum menyelesaikan pembayaran.");
                }
            });
        });
    }
</script>
</body>
</html>