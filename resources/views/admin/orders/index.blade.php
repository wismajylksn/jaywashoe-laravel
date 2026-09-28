<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Jaywashoe Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root { 
            /* Canva-like Premium Palette */
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #4F46E5; 
            --brand-accent-soft: #EEF2FF;
            --brand-success: #10B981;
            --brand-success-soft: #ECFDF5;
            --brand-danger: #EF4444;
            --brand-danger-soft: #FEF2F2;
            --bg-body: #F8FAFC; 
            --text-main: #334155;
            --text-muted: #64748B;
            --surface-color: #ffffff;
            --border-color: #E2E8F0;
            
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.02);
            --shadow-md: 0 8px 16px -4px rgba(0,0,0,0.04), 0 4px 8px -4px rgba(0,0,0,0.02);
            --shadow-lg: 0 20px 40px -8px rgba(0,0,0,0.1);
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }
        
        html { overflow-y: scroll; }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main); 
            -webkit-font-smoothing: antialiased;
            letter-spacing: -0.01em;
        }

        /* Navbar Styling */
        .navbar-custom { 
            background: #0F172A; 
            padding: 0.8rem 0; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); 
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .navbar-brand { display: flex; align-items: center; gap: 12px; font-size: 1.3rem; font-weight: 800; color: #fff !important; letter-spacing: -0.5px; }
        .navbar-brand img { width: 32px; height: 32px; border-radius: var(--radius-sm); object-fit: cover; background-color: white; padding: 2px; }
        .nav-link { color: #94A3B8 !important; font-weight: 500; padding: 0.5rem 1rem !important; border-radius: var(--radius-sm); transition: all 0.2s ease; margin: 0 2px; font-size: 0.95rem; }
        .nav-link:hover { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.05); }
        .nav-link.active { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.1); font-weight: 600; }
        .navbar-toggler { border: none; outline: none; padding: 4px; box-shadow: none !important; }

        /* General layout */
        .page-header { margin-bottom: 1.5rem; }
        .page-title { font-weight: 800; color: var(--brand-primary); letter-spacing: -0.5px; margin-bottom: 0.25rem; font-size: 1.5rem; }

        /* Search Bar */
        .custom-search { border-radius: 99px; padding: 0.6rem 1.25rem; border: 1px solid var(--border-color); font-size: 0.9rem; box-shadow: var(--shadow-sm); transition: 0.2s; background-color: var(--surface-color); }
        .custom-search:focus { border-color: var(--brand-accent); box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15); outline: none; }

        /* Data Cards (Canva Style) */
        .order-card {
            background-color: var(--surface-color);
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            padding: 1.25rem;
        }
        .order-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }

        .customer-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--brand-accent-soft), #C7D2FE);
            color: var(--brand-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.25rem;
            box-shadow: inset 0 2px 4px rgba(255,255,255,0.5);
        }

        /* Form Elements inside Card */
        .custom-select-sm {
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-main);
            padding: 0.5rem 2rem 0.5rem 1rem;
            background-color: #F8FAFC;
            cursor: pointer;
            transition: all 0.2s;
        }
        .custom-select-sm:focus { border-color: var(--brand-accent); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15); background-color: var(--surface-color); outline: none;}

        .btn-save {
            background-color: var(--brand-primary);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(15, 23, 42, 0.2);
        }
        .btn-save:hover { background-color: var(--brand-secondary); transform: translateY(-1px); box-shadow: 0 4px 8px rgba(15, 23, 42, 0.3); }

        /* Action Buttons */
        .btn-action {
            display: inline-flex; align-items: center; justify-content: center; gap: 6px;
            font-size: 0.85rem; font-weight: 600; padding: 8px 16px; border-radius: var(--radius-sm);
            transition: all 0.2s ease; text-decoration: none; border: none;
        }
        .btn-detail { background-color: #F1F5F9; color: var(--text-main); }
        .btn-detail:hover { background-color: #E2E8F0; transform: translateY(-1px); }
        .btn-wa { background-color: var(--brand-success-soft); color: var(--brand-success); }
        .btn-wa:hover { background-color: #D1FAE5; transform: translateY(-1px); }
        .btn-delete { background-color: var(--brand-danger-soft); color: var(--brand-danger); }
        .btn-delete:hover { background-color: #FEE2E2; transform: translateY(-1px); }

        /* Modal Styling */
        .modal-content-custom { border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-lg); overflow: hidden; }
        .modal-header-custom { border-bottom: 1px solid var(--border-color); padding: 1.5rem; background-color: var(--surface-color); }
        .modal-body-custom { padding: 1.5rem; background-color: #F8FAFC; }
        .label-caps { font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; display: block; }
        
        .detail-box { border: none; border-radius: var(--radius-lg); background-color: var(--surface-color); box-shadow: var(--shadow-sm); }

        /* Responsive Adjustments */
        .desktop-header { display: none; }
        @media (min-width: 992px) {
            .desktop-header {
                display: flex;
                padding: 0 1.5rem 1rem 1.5rem;
                font-size: 0.75rem;
                font-weight: 700;
                color: var(--text-muted);
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://placehold.co/100x100/ffffff/111827?text=JW'">
                Jaywashoe Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 mt-3 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">Kelola Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.promos.index') }}">Kelola Promo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-md-5">
        
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3 page-header">
            <div>
                <h3 class="page-title mb-0">Manajemen Pesanan</h3>
            </div>
            
            <form id="searchForm" action="{{ route('admin.orders.index') }}" method="GET" class="d-flex gap-2 w-100" style="max-width: 350px;">
                <input id="searchInput" type="text" name="search" value="{{ request('search') }}" class="form-control custom-search" placeholder="Cari nama, resi, atau No WA...">
                <button type="submit" class="btn d-none">Cari</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-3 mb-4 shadow-sm border-0" style="background-color: var(--brand-success-soft); color: var(--brand-success); border-radius: var(--radius-lg);">
                <div class="bg-white p-2 rounded-circle d-flex" style="box-shadow: var(--shadow-sm);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <div class="fw-bold">{{ session('success') }}</div>
            </div>
        @endif

        <div class="desktop-header row mx-0">
            <div class="col-lg-4">Pelanggan</div>
            <div class="col-lg-8">Status & Aksi</div>
        </div>

        <div class="order-list">
            @forelse($orders as $order)
            <div class="order-card">
                <div class="row gy-4 align-items-center">
                    
                    <!-- INFO PELANGGAN -->
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="customer-avatar">
                                {{ substr($order->customer_name, 0, 1) }}
                            </div>
                            <div>
                                <h6 class="mb-1 fw-bold text-truncate" style="color: var(--brand-primary); max-width: 180px; font-size: 1.05rem;">
                                    {{ $order->customer_name }}
                                </h6>
                                <div class="d-flex align-items-center gap-1 text-muted" style="font-size: 0.85rem; font-weight: 600;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    {{ $order->customer_phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- STATUS & AKSI -->
                    <div class="col-12 col-lg-8">
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="mb-3">
                            @csrf
                            @method('PUT')
                            <div class="row g-2">
                                <div class="col-6 col-sm-4">
                                    <select name="payment_status" class="form-select custom-select-sm w-100">
                                        <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>⏳ Unpaid</option>
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>✅ Paid</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <select name="tracking_status" class="form-select custom-select-sm w-100">
                                        <option value="belum_bayar" {{ $order->tracking_status == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="ready_to_pickup" {{ $order->tracking_status == 'ready_to_pickup' ? 'selected' : '' }}>Ready to Pickup</option>
                                        <option value="on_process" {{ $order->tracking_status == 'on_process' ? 'selected' : '' }}>On Process</option>
                                        <option value="ready_to_delivery" {{ $order->tracking_status == 'ready_to_delivery' ? 'selected' : '' }}>Ready to Delivery</option>
                                        <option value="selesai" {{ $order->tracking_status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <button type="submit" class="btn-save w-100 h-100">Update Status</button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="row g-2 pt-3" style="border-top: 1px dashed var(--border-color);">
                            <div class="col-6 col-sm-auto">
                                <button type="button" class="btn-action btn-detail w-100" data-bs-toggle="modal" data-bs-target="#detailModal{{ $order->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    Detail
                                </button>
                            </div>
                            <div class="col-6 col-sm-auto">
                                @php
                                    $waNumber = str_starts_with($order->customer_phone, '0') ? '62' . substr($order->customer_phone, 1) : $order->customer_phone;
                                    $waText = "Halo Kak {$order->customer_name}, Pesanan sepatu Kakak sudah kami terima! Yuk, cek nota tagihan dan pantau progres live sepatu Kakak di sini:\n\n" . route('order.track', $order->uuid);
                                    $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($waText);
                                @endphp
                                <a href="{{ $waLink }}" target="_blank" class="btn-action btn-wa w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                    WA
                                </a>
                            </div>
                            <div class="col-12 col-sm-auto ms-sm-auto">
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data pesanan ini?');" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal Detail -->
            <div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-content-custom">
                        <div class="modal-header modal-header-custom align-items-center">
                            <h5 class="modal-title fw-bold" style="color: var(--brand-primary); font-size: 1.25rem;">Detail Pesanan</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-custom">
                            
                            <div class="mb-4 detail-box p-4">
                                <div class="mb-3">
                                    <span class="label-caps text-primary" style="color: var(--brand-accent) !important;">Nomor Resi / UUID</span>
                                    <div class="fw-bold text-break" style="font-size: 1rem; color: var(--brand-primary); font-family: 'Courier New', monospace;">
                                        {{ $order->uuid }}
                                    </div>
                                </div>
                                <div>
                                    <span class="label-caps">Waktu Order</span>
                                    <div style="font-size: 0.95rem; font-weight: 600; color: var(--text-main);">
                                        {{ $order->created_at->format('d M Y, H:i') }}
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 detail-box p-3 d-flex align-items-center gap-3">
                                <div class="customer-avatar" style="width: 48px; height: 48px; font-size: 1.1rem;">
                                    {{ substr($order->customer_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-bold" style="color: var(--brand-primary); font-size: 1.05rem;">{{ $order->customer_name }}</div>
                                    <div style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600;">{{ $order->customer_phone }}</div>
                                </div>
                            </div>

                            <span class="label-caps mb-2 px-1">Rincian Tagihan</span>
                            <div class="detail-box p-4 mb-2">
                                @foreach($order->items as $item)
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div style="font-size: 0.95rem; font-weight: 600; color: var(--text-main);">
                                        <span class="badge bg-primary-subtle text-primary fw-bold me-2 px-2 py-1" style="background-color: var(--brand-accent-soft) !important; color: var(--brand-accent) !important; border-radius: 6px;">{{ $item->quantity }}x</span> 
                                        {{ $item->service->name ?? 'Layanan Dihapus' }}
                                    </div>
                                    <div class="fw-bold text-end" style="font-size: 0.95rem; color: var(--text-main); min-width: 90px;">
                                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                    </div>
                                </div>
                                @endforeach
                                
                                <hr style="border-style: dashed; border-color: #CBD5E1; margin: 20px 0;">
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold" style="font-size: 0.85rem; color: var(--text-muted);">TOTAL TAGIHAN</span>
                                    <span class="fw-bold" style="font-size: 1.35rem; color: var(--brand-accent);">
                                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="text-center py-5 bg-white border-0" style="border-radius: var(--radius-xl); box-shadow: var(--shadow-sm);">
                <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-3">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <h5 class="fw-bold text-dark mb-1">Pencarian Tidak Ditemukan</h5>
                <p class="text-muted">Tidak ada pesanan yang sesuai dengan kata kunci tersebut.</p>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary mt-2" style="border-radius: var(--radius-sm); font-weight: 600;">Lihat Semua Pesanan</a>
            </div>
            @endforelse
        </div>
        
        <div class="d-flex justify-content-end mt-4">
            {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            let typingTimer;                
            const doneTypingInterval = 500; 

            if (searchInput && searchForm) {
                if (searchInput.value) {
                    searchInput.focus();
                    const val = searchInput.value;
                    searchInput.value = '';
                    searchInput.value = val;
                }
                searchInput.addEventListener('input', function () {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(function () {
                        searchForm.submit();
                    }, doneTypingInterval);
                });
            }
        });
    </script>
</body>
</html>