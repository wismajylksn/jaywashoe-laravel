<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Jaywashoe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar 3 Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">Jaywashoe Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
    <li class="nav-item"><a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.services.index') }}">Kelola Layanan</a></li>
</ul>
            </div>
        </div>
    </nav>

    <!-- Konten Hanya Kartu Statistik -->
    <div class="container py-4">
        <h4 class="mb-4">Ringkasan Bisnis</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card text-bg-success shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h6 class="card-title text-uppercase text-white-50">Saldo Pemasukan (Selesai)</h6>
                        <h2 class="mb-0 fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card text-bg-primary shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h6 class="card-title text-uppercase text-white-50">Total Pesanan Masuk</h6>
                        <h2 class="mb-0 fw-bold">{{ $totalPesanan }} Pesanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>