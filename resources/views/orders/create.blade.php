<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Layanan - Jaywashoe</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS Variables for Premium Theme */
        :root {
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6;
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

        .premium-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            overflow: hidden;
        }

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
            font-size: 1rem;
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

        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2364748B' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 18px;
            padding-right: 45px;
        }

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
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .card-body {
                padding: 1.5rem !important;
            }
        }
        .service-option {
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .service-option:hover {
            background-color: #F8FAFC;
            border-color: var(--brand-accent);
        }

        .service-option.selected {
            background-color: rgba(59, 130, 246, 0.06);
            border-color: var(--brand-accent);
            border-width: 2px;
        }
    </style>
</head>
<body>

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            
            <div class="card premium-card">
                <div class="card-header-custom">
                    <div class="brand-logo-wrapper">
    <!-- SVG lama dihapus, diganti dengan tag gambar -->
    <img src="{{ asset('images/logo.png') }}" alt="Logo Jaywashoe" style="width: 100%; height: 100%; object-fit: contain; padding: 5px; border-radius: 16px;">
</div>
                    <h5 class="brand-title">Jaywashoe</h5>
                    <p class="brand-subtitle">Premium Shoe Treatment</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    
                    <!-- BLOK PENAMPIL ERROR DITAMBAHKAN DI SINI -->
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4" style="font-size: 0.85rem; border: none; background-color: #FEF2F2; color: #991B1B;">
                            <ul class="mb-0 px-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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

                    <!-- Trigger tombol untuk buka modal -->
                    <button type="button" class="form-control custom-input text-start d-flex justify-content-between align-items-center" 
                            data-bs-toggle="modal" data-bs-target="#serviceModal" id="serviceTrigger">
                        <span id="serviceTriggerText" style="color: #94A3B8; font-weight: 400;">-- Pilih jenis perawatan --</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>

                    <!-- Hidden input yang benar-benar dikirim ke backend -->
                    <input type="hidden" name="service_id" id="service_id_input" required>
                </div>

                <!-- Modal Pilih Layanan -->
                <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="border-radius: 20px; border: none;">
                            <div class="modal-header" style="border-bottom: 1px solid var(--border-color); padding: 1.25rem 1.5rem;">
                                <h5 class="modal-title" id="serviceModalLabel" style="font-weight: 700; color: var(--brand-primary);">Pilih Layanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-3">
                                @foreach($services as $service)
                                    <div class="service-option d-flex justify-content-between align-items-center" 
                                        data-id="{{ $service->id }}" 
                                        data-name="{{ $service->name }}" 
                                        data-price="{{ number_format($service->price, 0, ',', '.') }}">
                                        <div>
                                            <p class="mb-0" style="font-weight: 700; color: var(--brand-primary);">{{ $service->name }}</p>
                                            <p class="mb-0" style="font-size: 0.85rem; color: var(--text-muted);">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                                        </div>
                                        <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--brand-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                        
                        <button type="submit" class="btn btn-premium w-100">
                            Buat Pesanan & Bayar
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <small style="color: #94A3B8; font-weight: 500;">&copy; {{ date('Y') }} Jaywashoe. All rights reserved.</small>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.service-option').forEach(option => {
        option.addEventListener('click', function () {
            // reset semua opsi
            document.querySelectorAll('.service-option').forEach(el => {
                el.classList.remove('selected');
                el.querySelector('.check-icon').style.display = 'none';
            });

            // tandai yang dipilih
            this.classList.add('selected');
            this.querySelector('.check-icon').style.display = 'block';

            // update hidden input & teks trigger
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = this.dataset.price;

            document.getElementById('service_id_input').value = id;
            const triggerText = document.getElementById('serviceTriggerText');
            triggerText.textContent = `${name} (Rp ${price})`;
            triggerText.style.color = 'var(--brand-primary)';
            triggerText.style.fontWeight = '600';

            // tutup modal otomatis
            bootstrap.Modal.getInstance(document.getElementById('serviceModal')).hide();
        });
    });
</script>
</body>
</html>