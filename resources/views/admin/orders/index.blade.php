<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Jaywashoe</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Variables for Premium Theme */
        :root {
            --brand-primary: #0F172A; /* Deep Navy */
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6; /* Blue */
            --brand-success: #10B981; /* Emerald Green */
            --brand-danger: #EF4444; /* Soft Red */
            --bg-body: #F8FAFC;
            --text-main: #334155;
            --text-muted: #64748B;
            --surface-color: #ffffff;
            --border-color: #E2E8F0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

        /* Premium Navbar Styling */
        .navbar-custom {
            background-color: var(--brand-primary);
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.35rem;
            letter-spacing: -0.5px;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: #94A3B8 !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            margin: 0 4px;
        }

        .nav-link:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: #ffffff !important;
            background-color: var(--brand-accent);
            font-weight: 600;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
            outline: 2px solid rgba(255,255,255,0.2);
        }

        /* Page Headers */
        .page-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--brand-primary);
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }
        
        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* Premium Table Card */
        .table-card {
            background-color: var(--surface-color);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            overflow: hidden; /* Keeps table rounded */
        }

        /* Custom Table Styling */
        .table-custom {
            margin-bottom: 0;
            white-space: nowrap; /* Prevents awkward wrapping on mobile */
        }

        .table-custom thead th {
            background-color: #F8FAFC;
            color: #64748B;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table-custom tbody td {
            padding: 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
            color: var(--text-main);
            font-weight: 500;
        }

        .table-custom tbody tr:hover {
            background-color: #F8FAFC;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* Customer Info */
        .customer-name {
            font-weight: 700;
            color: var(--brand-primary);
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .customer-phone {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Form & Inputs in Table */
        .custom-select-sm {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--brand-primary);
            padding: 0.35rem 2rem 0.35rem 0.75rem;
            box-shadow: none;
            background-color: var(--bg-body);
        }
        
        .custom-select-sm:focus {
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn-save {
            background-color: var(--brand-primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.4rem 1rem;
            transition: all 0.2s;
        }

        .btn-save:hover {
            background-color: var(--brand-secondary);
            transform: translateY(-1px);
        }

        /* Action Buttons */
        .action-group {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px dashed var(--border-color);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-wa {
            background-color: #ECFDF5;
            color: var(--brand-success);
        }
        
        .btn-wa:hover {
            background-color: #D1FAE5;
            color: #047857;
        }

        .btn-delete {
            background-color: #FEF2F2;
            color: var(--brand-danger);
            border: none;
        }

        .btn-delete:hover {
            background-color: #FEE2E2;
            color: #B91C1C;
        }

        .link-public {
            color: var(--brand-accent);
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: opacity 0.2s;
        }
        
        .link-public:hover {
            opacity: 0.8;
        }

        /* Custom Alert */
        .alert-premium {
            background-color: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
            border-radius: 12px;
            font-weight: 600;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    
    <!-- Navbar Premium -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                </svg>
                Jaywashoe Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <!-- Navbar aktif dipindah ke menu ini -->
                        <a class="nav-link active" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.services.index') }}">Kelola Layanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4 py-md-5">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3">
            <div>
                <h4 class="page-title">Manajemen Pesanan</h4>
                <p class="page-subtitle mb-0">Kelola status pengerjaan dan pembayaran pelanggan.</p>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-premium mb-4 shadow-sm" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Data Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>Layanan & Total</th>
                            <th style="min-width: 320px;">Aksi & Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <!-- Kolom 1: Pelanggan -->
                            <td>
                                <div class="customer-name">{{ $order->customer_name }}</div>
                                <div class="customer-phone">{{ $order->customer_phone }}</div>
                            </td>
                            
                            <!-- Kolom 2: Layanan -->
                            <td>
                                <div style="font-weight: 700; color: var(--brand-secondary);">{{ $order->service_type }}</div>
                                <div style="color: var(--brand-accent); font-size: 0.9rem; font-weight: 800;">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </div>
                            </td>
                            
                            <!-- Kolom 3: Status & Aksi -->
                            <td>
                                <!-- Form Update Status -->
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="d-flex flex-wrap gap-2 mb-0">
                                    @csrf
                                    @method('PUT')
                                    <select name="payment_status" class="form-select custom-select-sm" style="width: 110px;">
                                        <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    </select>
                                    
                                    <select name="tracking_status" class="form-select custom-select-sm" style="width: 120px;">
                                       <option value="pickup" {{ $order->tracking_status == 'ready_to_pickup' ? 'selected' : '' }}>Ready to Pickup</option>
                                        <option value="arrived" {{ $order->tracking_status == 'arrived' ? 'selected' : '' }}>Arrived</option>
                                        <option value="washed" {{ $order->tracking_status == 'washed' ? 'selected' : '' }}>Washed</option>
                                        <option value="ready_to_delivered" {{ $order->tracking_status == 'ready_to_delivered' ? 'selected' : '' }}>Ready to Delivered</option>
                                        <option value="sukses" {{ $order->tracking_status == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                    </select>
                                    
                                    <button type="submit" class="btn-save">Simpan</button>
                                </form>

                                <!-- Tombol Aksi Tambahan dipisah dengan garis putus-putus -->
                                <div class="action-group">
                                    
                                    <!-- WA Logic dari Blade ASLI (Tidak diubah) -->
                                    @php
                                        $waNumber = str_starts_with($order->customer_phone, '0') ? '62' . substr($order->customer_phone, 1) : $order->customer_phone;
                                        $waText = "Halo Kak {$order->customer_name},\n\nBerikut link nota tagihan dan status live sepatu kakak:\n" . route('order.track', $order->uuid);
                                        $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($waText);
                                    @endphp
                                    
                                    <!-- Tombol WA -->
                                    <a href="{{ $waLink }}" target="_blank" class="btn-action btn-wa">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                        </svg>
                                        Kirim WA
                                    </a>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data pesanan ini?');" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-3">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                                <h6 class="text-muted mb-0">Belum ada pesanan yang masuk.</h6>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Required for Mobile Navbar Toggle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>