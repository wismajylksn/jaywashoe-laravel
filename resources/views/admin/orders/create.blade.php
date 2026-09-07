<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Layanan - Jaywashoe</title>
    
    <!-- Google Fonts: Plus Jakarta Sans for a premium, modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS Variables for Premium Theme */
        :root {
            --brand-primary: #0F172A; /* Deep Navy / Slate 900 */
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6; /* Blue Accent for focus */
            --bg-body: #F8FAFC;
            --bg-input: #F8FAFC;
            --border-input: #E2E8F0;
            --text-main: #334155;
            --text-muted: #64748B;
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
            background: #ffffff;
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
            transform: rotate(-5deg);
            transition: transform 0.3s ease;
        }

        .premium-card:hover .brand-logo-wrapper {
            transform: rotate(0deg) scale(1.05);
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

        /* Form Controls */
        .form-label {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .custom-input {
            border-radius: 14px;
            padding: 14px 18px;
            font-size: 1rem; /* 16px to prevent iOS auto-zoom */
            font-weight: 500;
            color: var(--brand-primary);
            background-color: var(--bg-input);
            border: 1px solid var(--border-input);
            transition: all 0.3s ease;
            box-shadow: none;
        }

        .custom-input::placeholder {
            color: #94A3B8;
            font-weight: 400;
        }

        .custom-input:focus {
            background-color: #ffffff;
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 4px rgba(15, 23, 42, 0.08);
            outline: none;
        }

        /* Custom Select specifically for better mobile UI */
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2364748B' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 18px;
            padding-right: 45px;
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

        /* Mobile specific adjustments */
        @media (max-width: 576px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .card-body {
                padding: 1.5rem !important;
            }
        }
    </style>
</head>
<body>

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            
            <div class="card premium-card">
                <!-- Custom Header replacing the error code -->
                <div class="card-header-custom">
                    <div class="brand-logo-wrapper">
                        <!-- Premium Sparkle/Clean Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--brand-primary)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                        </svg>
                    </div>
                    <h5 class="brand-title">Jaywashoe</h5>
                    <p class="brand-subtitle">Premium Shoe Treatment</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <!-- Form tetap menggunakan struktur backend Laravel Anda -->
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label">NAMA LENGKAP</label>
                            <input type="text" name="customer_name" class="form-control custom-input" required placeholder="Masukkan nama Anda" autocomplete="name">
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">NO. WHATSAPP</label>
                            <input type="tel" name="customer_phone" class="form-control custom-input" required placeholder="Contoh: 08123456789" autocomplete="tel">
                        </div>
                        
                        <div class="mb-5">
                            <label class="form-label">PILIH LAYANAN</label>
                            <!-- Custom styling untuk Select agar elegan -->
                            <select name="service_id" class="form-select custom-input custom-select" required>
                                <option value="" disabled selected>-- Pilih jenis perawatan --</option>
                                
                                <!-- Looping data layanan dari database (Laravel syntax kept intact) -->
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->name }} (Rp {{ number_format($service->price, 0, ',', '.') }})
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-premium w-100">
                            Buat Pesanan & Bayar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Optional: Clean footer mark -->
            <div class="text-center mt-4">
                <small style="color: #94A3B8; font-weight: 500;">&copy; {{ date('Y') }} Jaywashoe. All rights reserved.</small>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional, kept for compatibility if needed for alerts/modals later) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>