<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jaywashoe</title>
    
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

        /* Section Title */
        .page-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--brand-primary);
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        /* Premium Stat Cards */
        .stat-card {
            background-color: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08);
        }

        /* Icon Wrappers for Stats */
        .icon-wrapper {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .icon-revenue {
            background-color: #ECFDF5; /* Soft Emerald */
            color: var(--brand-success);
        }

        .icon-orders {
            background-color: #EFF6FF; /* Soft Blue */
            color: var(--brand-accent);
        }

        /* Stat Texts */
        .stat-label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--brand-primary);
            margin-bottom: 0;
            letter-spacing: -0.5px;
        }

        /* Responsive Adjustments */
        @media (max-width: 767.98px) {
            .navbar-collapse {
                background-color: var(--brand-secondary);
                padding: 1rem;
                border-radius: 12px;
                margin-top: 10px;
            }
            .nav-link {
                margin: 4px 0;
            }
            .stat-value {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    
    <!-- Navbar Premium -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <!-- Sparkle Brand Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                </svg>
                Jaywashoe Admin
            </a>
            
            <!-- Hamburger menu button (Important for mobile-first) -->
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
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
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
        
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="page-title">Ringkasan Bisnis</h4>
                <p class="page-subtitle">Pantau performa layanan dan pesanan Jaywashoe hari ini.</p>
            </div>
        </div>
        
        <!-- Cards Section -->
        <div class="row g-4">
            
            <!-- Card 1: Revenue -->
            <div class="col-12 col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper icon-revenue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    </div>

    <!-- Bootstrap JS (Required for Mobile Navbar Toggle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>