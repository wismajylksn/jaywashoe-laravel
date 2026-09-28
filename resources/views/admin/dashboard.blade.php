<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jaywashoe</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            /* Canva-like Premium Palette */
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #4F46E5; /* Premium Indigo */
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
            
            /* Soft Shadows */
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.02);
            --shadow-md: 0 8px 16px -4px rgba(0,0,0,0.04), 0 4px 8px -4px rgba(0,0,0,0.02);
            --shadow-lg: 0 12px 24px -6px rgba(0,0,0,0.06);
            
            /* Consistent Radius */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
        }

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
        .navbar-brand { font-weight: 800; font-size: 1.3rem; letter-spacing: -0.5px; color: #ffffff !important; display: flex; align-items: center; gap: 12px; }
        .navbar-brand img { width: 32px; height: 32px; border-radius: var(--radius-sm); background-color: white; padding: 2px; }
        .nav-link { color: #94A3B8 !important; font-weight: 500; padding: 0.5rem 1rem !important; border-radius: var(--radius-sm); transition: all 0.2s ease; margin: 0 2px; font-size: 0.95rem; }
        .nav-link:hover { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.05); }
        .nav-link.active { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.1); font-weight: 600; }
        .navbar-toggler { border: none; outline: none; padding: 4px; box-shadow: none !important; }

        .btn-logout {
            background-color: rgba(239, 68, 68, 0.1);
            color: #EF4444 !important;
            font-weight: 600;
            border-radius: var(--radius-sm);
            padding: 0.5rem 1.25rem;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            font-size: 0.95rem;
        }
        .btn-logout:hover { background-color: #EF4444; color: #ffffff !important; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2); }

        /* Typography */
        .page-title { font-size: 1.5rem; font-weight: 800; color: var(--brand-primary); letter-spacing: -0.5px; margin-bottom: 0.25rem; }
        .label-caps { font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }

        /* Stat Cards */
        .stat-card {
            background-color: var(--surface-color);
            border: none;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .icon-wrapper { width: 64px; height: 64px; border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; margin-right: 20px; flex-shrink: 0; }
        .icon-revenue { background-color: var(--brand-success-soft); color: var(--brand-success); }
        .icon-orders { background-color: var(--brand-accent-soft); color: var(--brand-accent); }
        
        .stat-label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--text-muted); margin-bottom: 4px; }
        .stat-value { font-size: 1.85rem; font-weight: 800; color: var(--brand-primary); margin-bottom: 0; letter-spacing: -0.5px; }

        /* Filter Select */
        .filter-select {
            border-radius: 99px;
            border: 1px solid var(--border-color);
            padding: 0.5rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--brand-primary);
            background-color: var(--surface-color);
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s;
        }
        .filter-select:focus { border-color: var(--brand-accent); box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15); outline: none; }

        /* Table & Badges */
        .table-wrapper { background: var(--surface-color); border-radius: var(--radius-xl); box-shadow: var(--shadow-md); overflow: hidden; padding: 0; }
        .table-custom th { padding: 1.25rem; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--border-color); background-color: #F8FAFC; font-weight: 700; }
        .table-custom td { padding: 1.25rem; border-bottom: 1px solid #F1F5F9; vertical-align: middle; }
        .table-custom tbody tr:last-child td { border-bottom: none; }
        .table-custom tbody tr:hover { background-color: #F8FAFC; }

        .btn-outline-accent { background-color: var(--brand-accent-soft); color: var(--brand-accent); font-weight: 600; border-radius: var(--radius-sm); padding: 8px 16px; transition: 0.2s; border: none; font-size: 0.9rem; }
        .btn-outline-accent:hover { background-color: #E0E7FF; color: var(--brand-accent); transform: translateY(-1px); }

        .badge-soft-success { background-color: var(--brand-success-soft); color: var(--brand-success); padding: 6px 12px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 700; border: 1px solid rgba(16, 185, 129, 0.1); display: inline-block; }
        .badge-soft-danger { background-color: var(--brand-danger-soft); color: var(--brand-danger); padding: 6px 12px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 700; border: 1px solid rgba(239, 68, 68, 0.1); display: inline-block; }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://placehold.co/100x100/ffffff/111827?text=JW'">
                Jaywashoe Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 align-items-lg-center mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.services.index') }}">Kelola Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.promos.index') }}">Kelola Promo</a>
                    </li>
                    
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-2 ps-lg-3 border-lg-start border-secondary">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-logout w-100">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4 py-md-5">
        
        <!-- Header & Filter Section -->
        <div class="row mb-4 align-items-center">
            <div class="col-12 col-md-6 mb-3 mb-md-0">
                <h4 class="page-title">Ringkasan Bisnis</h4>
            </div>
            
            <!-- FORM FILTER WAKTU DI SINI -->
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex align-items-center gap-2">
                    <label for="filter" class="label-caps mb-0 d-flex align-items-center" style="white-space: nowrap;">TAMPILKAN:</label>
                    
                    <select name="filter" id="filter" class="form-select filter-select" onchange="this.form.submit()">
                        <option value="semua" {{ $filter == 'semua' ? 'selected' : '' }}>Semua Waktu</option>
                        <option value="hari_ini" {{ $filter == 'hari_ini' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="minggu_ini" {{ $filter == 'minggu_ini' ? 'selected' : '' }}>7 Hari Terakhir</option>
                        <option value="bulan_ini" {{ $filter == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="tahun_ini" {{ $filter == 'tahun_ini' ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                </form>
            </div>
        </div>
        
        <!-- Cards Section -->
        <div class="row g-4">
            
            <!-- Card 1: Revenue -->
            <div class="col-12 col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper icon-revenue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                            <line x1="2" y1="10" x2="22" y2="10"></line>
                        </svg>
                    </div>
                    <div>
                        <div class="stat-label">Saldo Pemasukan (Selesai)</div>
                        <h2 class="stat-value">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Orders -->
            <div class="col-12 col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper icon-orders">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="stat-label">Total Pesanan Masuk</div>
                        <h2 class="stat-value">{{ $totalPesanan }} <span style="font-size: 1rem; color: var(--text-muted); font-weight: 600;">Pesanan</span></h2>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tabel Daftar Pesanan Sesuai Filter -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 px-1">
                    <h5 class="fw-bold mb-0" style="color: var(--brand-primary); font-size: 1.15rem;">Daftar Pesanan Masuk</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-accent">Lihat Semua &rarr;</a>
                </div>
                
                <div class="table-wrapper">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle mb-0" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>PELANGGAN & RESI</th>
                                    <th>WAKTU MASUK</th>
                                    <th>PEMBAYARAN</th>
                                    <th class="text-end">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                <tr>
                                    <td>
                                        <div class="fw-bold" style="color: var(--brand-primary); font-size: 0.95rem;">{{ $order->customer_name }}</div>
                                        <div style="font-size: 0.8rem; color: var(--text-muted); font-family: 'Courier New', monospace; font-weight: 600;">{{ explode('-', $order->uuid)[0] }}...</div>
                                    </td>
                                    <td>
                                        <span style="font-weight: 600; font-size: 0.9rem; color: var(--text-main);">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                    </td>
                                    <td>
                                        @if($order->payment_status == 'paid')
                                            <span class="badge-soft-success">Lunas</span>
                                        @else
                                            <span class="badge-soft-danger">Belum Bayar</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <span style="font-weight: 800; color: var(--brand-accent); font-size: 1rem;">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted" style="font-weight: 500;">Tidak ada pesanan masuk pada rentang waktu ini.</div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>