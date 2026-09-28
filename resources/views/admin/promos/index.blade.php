<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Promo - Jaywashoe Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root { 
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

        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg-body); color: var(--text-main); letter-spacing: -0.01em; }

        /* Navbar */
        .navbar-custom { background: #0F172A; padding: 0.8rem 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-bottom: 1px solid rgba(255,255,255,0.05); }
        .navbar-brand { display: flex; align-items: center; gap: 12px; font-size: 1.3rem; font-weight: 800; color: #fff !important; letter-spacing: -0.5px; }
        .navbar-brand img { width: 32px; height: 32px; border-radius: var(--radius-sm); background-color: white; padding: 2px; }
        .nav-link { color: #94A3B8 !important; font-weight: 500; padding: 0.5rem 1rem !important; border-radius: var(--radius-sm); transition: all 0.2s ease; margin: 0 2px; font-size: 0.95rem; }
        .nav-link:hover { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.05); }
        .nav-link.active { color: #ffffff !important; background-color: rgba(255, 255, 255, 0.1); font-weight: 600; }
        .navbar-toggler { border: none; outline: none; padding: 4px; box-shadow: none !important; }

        /* General layout */
        .page-title { font-weight: 800; color: var(--brand-primary); letter-spacing: -0.5px; margin-bottom: 0.25rem; font-size: 1.5rem;}
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--brand-accent) 0%, #6366F1 100%);
            color: white; border: none; border-radius: var(--radius-md); font-weight: 600; padding: 12px 24px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25); transition: all 0.3s ease; font-size: 0.95rem;
        }
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35); color: white;}

        /* Table & Badges */
        .table-card { background-color: var(--surface-color); border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-md); overflow: hidden; padding: 0; }
        .table-custom th { padding: 1.25rem; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--border-color); background-color: #F8FAFC; font-weight: 700; }
        .table-custom td { padding: 1.25rem; border-bottom: 1px solid #F1F5F9; vertical-align: middle; }
        .table-custom tbody tr:last-child td { border-bottom: none; }
        .table-custom tbody tr:hover { background-color: #F8FAFC; }

        .promo-code-badge { 
            font-family: 'Courier New', Courier, monospace; 
            background-color: var(--brand-accent-soft); 
            color: var(--brand-accent); 
            padding: 8px 16px; 
            border-radius: var(--radius-sm); 
            font-weight: 800; 
            font-size: 1.05rem; 
            border: 2px dashed rgba(79, 70, 229, 0.4); 
            display: inline-block; 
            letter-spacing: 1px;
        }
        
        .badge-status { padding: 6px 12px; border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 700; display: inline-block; border: 1px solid transparent; }
        .badge-active { background-color: var(--brand-success-soft); color: var(--brand-success); border-color: rgba(16, 185, 129, 0.1); }
        .badge-inactive { background-color: #F1F5F9; color: var(--text-muted); border-color: var(--border-color); }

        /* Actions */
        .btn-action-edit, .btn-action-delete { font-weight: 600; padding: 8px 16px; border-radius: var(--radius-sm); border: none; font-size: 0.9rem; transition: 0.2s; }
        .btn-action-edit { background-color: var(--brand-accent-soft); color: var(--brand-accent); }
        .btn-action-edit:hover { background-color: #E0E7FF; transform: translateY(-1px); }
        .btn-action-delete { background-color: var(--brand-danger-soft); color: var(--brand-danger); }
        .btn-action-delete:hover { background-color: #FEE2E2; transform: translateY(-1px); }

        /* Modals & Forms */
        .modal-content { border-radius: var(--radius-xl); border: none; box-shadow: var(--shadow-lg); }
        .modal-header { border-bottom: 1px solid var(--border-color); padding: 1.5rem; }
        .modal-footer { border-top: none; padding: 1rem 1.5rem 1.5rem; }
        .custom-input { border-radius: var(--radius-md); padding: 12px 16px; border: 1px solid var(--border-color); background-color: #F8FAFC; color: var(--brand-primary); font-weight: 500; box-shadow: inset 0 1px 2px rgba(0,0,0,0.02); transition: 0.2s; }
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">Kelola Layanan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('admin.promos.index') }}">Kelola Promo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-md-5">
        
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-4 fw-bold shadow-sm border-0" style="background-color: #ECFDF5; color: #10B981; border-radius: var(--radius-lg);">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mb-4 shadow-sm border-0" style="background-color: var(--brand-danger-soft); color: var(--brand-danger); border-radius: var(--radius-lg);">
                <ul class="mb-0 fw-bold">@foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach</ul>
            </div>
        @endif

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h3 class="page-title mb-0">Manajemen Promo</h3>
                <p class="text-muted mb-0">Buat kode diskon untuk menarik lebih banyak pelanggan.</p>
            </div>
            <div class="d-grid d-md-block">
                <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addPromoModal">
                    + Tambah Promo
                </button>
            </div>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0" style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>Detail Promo</th>
                            <th>Kode Promo</th>
                            <th>Nilai Diskon</th>
                            <th>Batas Waktu</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promos as $promo)
                        <tr>
                            <td>
                                <div class="fw-bold mb-1" style="color: var(--brand-primary); font-size: 1.05rem;">{{ $promo->name }}</div>
                                @if($promo->is_active)
                                    <span class="badge-status badge-active">Aktif</span>
                                @else
                                    <span class="badge-status badge-inactive">Nonaktif</span>
                                @endif
                            </td>
                            <td><div class="promo-code-badge">{{ $promo->code }}</div></td>
                            <td>
                                <div style="color: var(--brand-accent); font-size: 1.1rem; font-weight: 800;">
                                    {{ $promo->type == 'percent' ? $promo->discount_value . '%' : 'Rp ' . number_format($promo->discount_value, 0, ',', '.') }}
                                </div>
                            </td>
                            <td>
                                <div class="text-muted fw-bold" style="font-size: 0.9rem;">
                                    {{ $promo->expired_at ? \Carbon\Carbon::parse($promo->expired_at)->format('d M Y') : 'Tanpa Batas Waktu' }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn-action-edit" data-bs-toggle="modal" data-bs-target="#editPromoModal{{ $promo->id }}">Edit</button>
                                    <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" class="m-0" onsubmit="return confirm('Yakin hapus promo ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-action-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editPromoModal{{ $promo->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold" style="color: var(--brand-primary);">Edit Promo</h5>
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="mb-3">
                                                <label class="label-caps">NAMA PROMO</label>
                                                <input type="text" name="name" value="{{ $promo->name }}" class="form-control custom-input" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="label-caps">KODE PROMO</label>
                                                <input type="text" name="code" value="{{ $promo->code }}" class="form-control custom-input" style="text-transform: uppercase; font-family: monospace; font-weight: 700; font-size: 1.1rem; letter-spacing: 2px;" required>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label class="label-caps">TIPE DISKON</label>
                                                    <select name="type" class="form-select custom-input" required>
                                                        <option value="fixed" {{ $promo->type == 'fixed' ? 'selected' : '' }}>Nominal (Rp)</option>
                                                        <option value="percent" {{ $promo->type == 'percent' ? 'selected' : '' }}>Persentase (%)</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="label-caps">NILAI DISKON</label>
                                                    <input type="number" name="discount_value" value="{{ $promo->discount_value }}" class="form-control custom-input" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="label-caps">STATUS PROMO</label>
                                                <select name="is_active" class="form-select custom-input" required>
                                                    <option value="1" {{ $promo->is_active ? 'selected' : '' }}>Aktif</option>
                                                    <option value="0" {{ !$promo->is_active ? 'selected' : '' }}>Nonaktif</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="label-caps">BATAS WAKTU (Opsional)</label>
                                                <input type="date" name="expired_at" value="{{ $promo->expired_at ? \Carbon\Carbon::parse($promo->expired_at)->format('Y-m-d') : '' }}" class="form-control custom-input">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn w-100 btn-primary-custom" style="padding: 14px; border-radius: var(--radius-md);">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr><td colspan="5" class="text-center py-5 text-muted fw-bold">Belum ada kode promo yang dibuat.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH PROMO -->
    <div class="modal fade" id="addPromoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.promos.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="color: var(--brand-primary);">Tambah Promo Baru</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="label-caps">NAMA PROMO</label>
                            <input type="text" name="name" class="form-control custom-input" placeholder="Contoh: Diskon Kemerdekaan" required>
                        </div>
                        <div class="mb-3">
                            <label class="label-caps">KODE PROMO</label>
                            <input type="text" name="code" class="form-control custom-input" placeholder="Contoh: MERDEKA45" style="text-transform: uppercase; font-family: monospace; font-weight: 700; font-size: 1.1rem; letter-spacing: 2px;" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="label-caps">TIPE DISKON</label>
                                <select name="type" class="form-select custom-input" required>
                                    <option value="fixed">Nominal (Rp)</option>
                                    <option value="percent">Persentase (%)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="label-caps">NILAI DISKON</label>
                                <input type="number" name="discount_value" class="form-control custom-input" placeholder="Misal: 20000 atau 15" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="label-caps">BATAS WAKTU (Opsional)</label>
                            <input type="date" name="expired_at" class="form-control custom-input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn w-100 btn-primary-custom" style="padding: 14px; border-radius: var(--radius-md);">Simpan Promo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>