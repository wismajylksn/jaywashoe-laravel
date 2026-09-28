<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Pesanan - Jaywashoe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Buat Pesanan Baru</h4>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.orders.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. WhatsApp</label>
                            <input type="text" name="customer_phone" class="form-control" required placeholder="0812...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select name="service_type" class="form-select" required>
                                <option value="Deep Clean Reguler">Deep Clean Reguler</option>
                                <option value="Unyellowing">Unyellowing</option>
                                <option value="Leather Care">Leather Care</option>
                                <option value="Repaint">Repaint</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Total Harga (Rp)</label>
                            <input type="number" name="total_amount" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Pesanan & Generate Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>