<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Jaywashoe</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Variables for Premium Theme */
        :root {
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #3B82F6;
            --brand-danger: #EF4444;
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

        /* Premium Card */
        .premium-card {
            background-color: var(--surface-color);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header-clean {
            background-color: var(--surface-color);
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            font-weight: 700;
            color: var(--brand-primary);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Form Inputs */
        .form-label-custom {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .custom-input {
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--brand-primary);
            background-color: #F8FAFC;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            box-shadow: none;
        }

        .custom-input::placeholder {
            color: #94A3B8;
            font-weight: 400;
        }

        .custom-input:focus {
            background-color: #ffffff;
            border-color: var(--brand-accent);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        /* Premium Button */
        .btn-premium {
            background-color: var(--brand-primary);
            color: #ffffff;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            font-weight: 600;
            border: none;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background-color: var(--brand-secondary);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.2);
        }

        /* Table Styling */
        .table-custom {
            margin-bottom: 0;
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
            font-weight: 600;
        }

        .table-custom tbody tr:hover {
            background-color: #F8FAFC;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* Action Buttons */
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

        .btn-delete {
            background-color: #FEF2F2;
            color: var(--brand-danger);
            border: none;
        }

        .btn-delete:hover {
            background-color: #FEE2E2;
            color: #B91C1C;
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
        .btn-edit {
            background-color: #EFF6FF;
            color: var(--brand-accent);
            border: none;
        }

        .btn-edit:hover {
            background-color: #DBEAFE;
            color: #1D4ED8;
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
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.services.index') }}">Kelola Layanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4 py-md-5">
        
        <!-- Header -->
        <div class="mb-4">
            <h4 class="page-title">Manajemen Layanan & Harga</h4>
            <p class="page-subtitle">Atur paket layanan yang tersedia untuk pelanggan Anda.</p>
        </div>
        
        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert alert-premium mb-4 shadow-sm" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            <!-- Kolom Form Tambah Layanan -->
            <div class="col-lg-4 col-md-12">
                <div class="premium-card h-100">
                    <div class="card-header-clean">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--brand-accent)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Layanan
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.services.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label-custom">NAMA LAYANAN</label>
                                <input type="text" name="name" class="form-control custom-input" required placeholder="Contoh: Deep Clean">
                            </div>
                            <div class="mb-4">
                                <label class="form-label-custom">HARGA (Rp)</label>
                                <input type="number" name="price" class="form-control custom-input" required placeholder="Contoh: 65000">
                            </div>
                            <button type="submit" class="btn btn-premium w-100">Simpan Layanan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kolom Tabel Daftar Layanan -->
            <div class="col-lg-8 col-md-12">
                <div class="premium-card h-100">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                <tr>
                                    <td style="color: var(--brand-primary);">{{ $service->name }}</td>
                                    <td style="color: var(--brand-accent);">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                    <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $service->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            Edit
                                        </button>

                                        <!-- Form Hapus Layanan -->
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');" class="m-0">
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

                                <!-- Modal Edit Layanan -->
                                <div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $service->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 20px; border: none;">
                                            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header" style="border-bottom: 1px solid var(--border-color); padding: 1.25rem 1.5rem;">
                                                    <h5 class="modal-title" id="editModalLabel{{ $service->id }}" style="font-weight: 700; color: var(--brand-primary);">Edit Layanan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="mb-3">
                                                        <label class="form-label-custom">NAMA LAYANAN</label>
                                                        <input type="text" name="name" class="form-control custom-input" required value="{{ $service->name }}">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label-custom">HARGA (Rp)</label>
                                                        <input type="number" name="price" class="form-control custom-input" required value="{{ $service->price }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="border-top: 1px solid var(--border-color); padding: 1.25rem 1.5rem;">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 12px; font-weight: 600;">Batal</button>
                                                    <button type="submit" class="btn btn-premium">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-3">
                                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                            <polyline points="2 17 12 22 22 17"></polyline>
                                            <polyline points="2 12 12 17 22 12"></polyline>
                                        </svg>
                                        <h6 class="text-muted mb-0">Belum ada data layanan yang ditambahkan.</h6>
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

    <!-- Bootstrap JS (Required for Mobile Navbar Toggle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>