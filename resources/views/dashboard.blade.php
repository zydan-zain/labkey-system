<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - LABKEY SYSTEM</title>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #1a1a1a;
            color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            height: 100vh;
            background-color: #0f0f0f;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .sidebar-brand {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: 2px;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-menu li {
            padding: 5px 20px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            color: #b0b0b0;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .sidebar-menu a i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255, 122, 0, 0.1);
            color: #ffb000;
            transform: translateX(5px);
            box-shadow: inset 3px 0 0 #ff7a00;
        }

        .logout-container {
            padding: 20px;
            margin-top: auto;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
            border-radius: 10px;
            padding: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-logout:hover {
            background-color: #dc3545;
            color: #fff;
            box-shadow: 0 0 15px rgba(220, 53, 69, 0.4);
        }

        /* Content Area */
        .content {
            margin-left: 280px;
            padding: 40px;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 15px;
        }

        .page-title {
            color: #f5f5f5;
            font-weight: 600;
            margin: 0;
        }

        .page-title span {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card & Table */
        .card-custom {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: floatUp 0.6s ease-out forwards;
        }

        @keyframes floatUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-dark-custom {
            --bs-table-bg: transparent;
            --bs-table-color: #e0e0e0;
            --bs-table-border-color: rgba(255,255,255,0.1);
            margin-bottom: 0;
        }

        .table-dark-custom thead th {
            background-color: rgba(0, 0, 0, 0.3);
            color: #ff7a00;
            font-weight: 600;
            border-bottom: 2px solid rgba(255, 122, 0, 0.3);
            padding: 15px;
        }

        .table-dark-custom tbody td {
            padding: 15px;
            vertical-align: middle;
        }
        
        .table-dark-custom tbody tr {
            transition: all 0.2s ease;
        }

        .table-dark-custom tbody tr:hover td {
            background-color: rgba(255, 122, 0, 0.1) !important;
            color: #ffffff !important;
        }

        .table-dark-custom tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.15);
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: normal;
        }

        .img-thumbnail-custom {
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.1);
            max-height: 50px;
            transition: transform 0.3s;
        }
        
        .img-thumbnail-custom:hover {
            transform: scale(2);
            z-index: 10;
            position: relative;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-cpu me-2"></i>LABKEY
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="/dashboard" class="active">
                    <i class="bi bi-clock-history"></i> Histori Peminjaman
                </a>
            </li>
            <li>
                <a href="/students">
                    <i class="bi bi-people"></i> Data Siswa
                </a>
            </li>
            <li>
                <a href="/keys">
                    <i class="bi bi-key"></i> Data Kunci Lab
                </a>
            </li>
        </ul>

        <div class="logout-container">
            <a href="/logout" class="btn-logout">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="page-title">Histori <span>Peminjaman</span></h3>
        </div>

        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-dark-custom table-hover">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Lab Dipinjam</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->student->nama ?? '-' }}</td>
                            <td><span class="text-warning fw-bold">{{ $transaction->keyLab->nama_lab ?? '-' }}</span></td>
                            <td>
                                @if(strtolower($transaction->status) == 'dipinjam')
                                    <span class="badge bg-warning text-dark badge-status">{{ $transaction->status }}</span>
                                @else
                                    <span class="badge bg-secondary badge-status">{{ $transaction->status }}</span>
                                @endif
                            </td>
                            <td class="text-light">{{ $transaction->created_at }}</td>
                            <td>
                                @if($transaction->foto)
                                    <img src="/uploads/{{ $transaction->foto }}" class="img-thumbnail-custom" width="60">
                                @else
                                    <span class="text-muted small">No photo</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>