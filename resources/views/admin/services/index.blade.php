<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Jaywashoe Admin</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { 
            --brand-primary: #0F172A;
            --brand-secondary: #1E293B;
            --brand-accent: #4F46E5; 
            --brand-accent-soft: #EEF2FF;
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
        
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg-body); color: var(--text-main); letter-spacing: -0.01em; }

        /* Navbar */
        .navbar-custom { background: #0F172A; padding: 0.8rem 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .navbar-brand { display: flex; align-items: center; gap: 12px; font-size: 1.3rem; font-weight: 800; color: #fff !important; letter-spacing: -0.5px; }
        .navbar-brand img { width: 32px; height: 32px; border-radius: var(--radius-sm); background-color: white; padding: 2px; }
        .nav-link { color: #94A3B8 !important; font-weight: 500; padding: 0.5rem 1rem !important; border-radius: var(--radius-sm); transition: all 0.2s ease; margin: 0 2px; font-size: 0.95rem; }
        .nav-link:hover { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.05); }
        .nav-link.active { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.1); font-weight: 600; }
        .navbar-toggler { border: none; outline: none; padding: 4px; box-shadow: none !important; }

        /* Header */
        .page-title { font-weight: 800; color: var(--brand-primary); letter-spacing: -0.5px; margin-bottom: 0.25rem; font-size: 1.5rem;}
        .page-subtitle { color: var(--text-muted); font-size: 0.95rem; }

        /* Primary Button Add */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--brand-accent) 0%, #6366F1 100%);
            color: white; border: none; border-radius: var(--radius-md); font-weight: 600; padding: 12px 24px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25); transition: all 0.3s ease; font-size: 0.95rem;
        }
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35); color: white;}

        /* List Styling */
        .table-card { background-color: var(--surface-color); border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-md); overflow: hidden; }
        .list-header { background-color: #F8FAFC; border-bottom: 1px solid var(--border-color); padding: 1.25rem 1.5rem; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
        .list-item { padding: 1.5rem; border-bottom: 1px solid #F1F5F9; transition: background-color 0.2s ease; }
        .list-item:hover { background-color: #F8FAFC; }
        .list-item:last-child { border-bottom: none; }
        
        .mobile-label { display: none; font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        @media (max-width: 767.98px) { .mobile-label { display: block; } }

        /* Actions */
        .btn-action-edit, .btn-action-delete { font-weight: 600; padding: 8px 16px; border-radius: var(--radius-sm); border: none; font-size: 0.9rem; transition: 0.2s; display: inline-block; width: 100%; text-align: center; }
        .btn-action-edit { background-color: var(--brand-accent-soft); color: var(--brand-accent); }
        .btn-action-edit:hover { background-color: #E0E7FF; transform: translateY(-1px); }
        .btn-action-delete { background-color: var(--brand-danger-soft); color: var(--brand-danger); }
        .btn-action-delete:hover { background-color: #FEE2E2; transform: translateY(-1px); }

        /* Modal & Form */
        .modal-content { border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-lg); }
        .modal-header { border-bottom: 1px solid var(--border-color); padding: 1.5rem; }
        .modal-footer { border-top: none; padding: 1rem 1.5rem 1.5rem; }
        
        .custom-input { border-radius: var(--radius-md); padding: 14px 16px; border: 1px solid var(--border-color); background-color: #F8FAFC; color: var(--brand-primary); font-weight: 500; box-shadow: inset 0 1px 2px rgba(0,0,0,0.02); transition: 0.2s; }
        .custom-input:focus { border-color: var(--brand-accent); box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15); background-color: var(--surface-color); outline: none; }
        .label-caps { font-size: 0.75rem; font-weight: 700; color: var(--text-muted); letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 8px; display: block; }
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('admin.services.index') }}">Kelola Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.promos.index') }}">Kelola Promo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-md-5">
        
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4 fw-bold shadow-sm border-0" style="background-color: #ECFDF5; color: #10B981; border-radius: var(--radius-lg);">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h3 class="page-title">Manajemen Layanan</h3>
                <p class="page-subtitle mb-0">Kelola daftar layanan dan harga cuci sepatu.</p>
            </div>
            
            <div class="d-grid d-md-block">
                <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    + Tambah Layanan
                </button>
            </div>
        </div>

        <div class="table-card">
            
            <div class="list-header d-none d-md-flex row mx-0">
                <div class="col-md-5">Nama Layanan</div>
                <div class="col-md-4">Harga</div>
                <div class="col-md-3 text-end">Aksi</div>
            </div>

            <div>
                @forelse($services as $service)
                <div class="list-item row mx-0 align-items-center">
                    
                    <div class="col-12 col-md-5 mb-3 mb-md-0">
                        <span class="mobile-label">Nama Layanan</span>
                        <div class="fw-bold" style="color: var(--brand-primary); font-size: 1.1rem;">
                            {{ $service->name }}
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <span class="mobile-label">Harga Layanan</span>
                        <div style="color: var(--brand-accent); font-size: 1.05rem; font-weight: 800; display: inline-block; background-color: var(--brand-accent-soft); padding: 6px 14px; border-radius: var(--radius-sm);">
                            Rp {{ number_format($service->price, 0, ',', '.') }}
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-3">
                        <div class="row g-2 justify-content-md-end">
                            <div class="col-6 col-md-auto">
                                <button type="button" class="btn-action-edit" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">
                                    Edit
                                </button>
                            </div>
                            <div class="col-6 col-md-auto">
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');" class="m-0">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-3">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="3" y1="9" x2="21" y2="9"></line>
                        <line x1="9" y1="21" x2="9" y2="9"></line>
                    </svg>
                    <h6 class="text-muted fw-bold mb-0">Belum ada layanan yang ditambahkan.</h6>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH LAYANAN -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.services.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="color: var(--brand-primary);">Tambah Layanan Baru</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-4">
                            <label class="label-caps">NAMA LAYANAN</label>
                            <input type="text" name="name" class="form-control custom-input" required placeholder="Contoh: Premium Wash">
                        </div>
                        <div class="mb-2">
                            <label class="label-caps">HARGA (Rp)</label>
                            <input type="number" name="price" class="form-control custom-input" required placeholder="Contoh: 50000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn w-100 btn-primary-custom" style="padding: 14px; border-radius: var(--radius-md);">Simpan Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT LAYANAN -->
    @foreach($services as $service)
    <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="color: var(--brand-primary);">Edit Layanan</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-4">
                            <label class="label-caps">NAMA LAYANAN</label>
                            <input type="text" name="name" value="{{ $service->name }}" class="form-control custom-input" required>
                        </div>
                        <div class="mb-2">
                            <label class="label-caps">HARGA (Rp)</label>
                            <input type="number" name="price" value="{{ $service->price }}" class="form-control custom-input" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn w-100 btn-primary-custom" style="padding: 14px; border-radius: var(--radius-md);">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>