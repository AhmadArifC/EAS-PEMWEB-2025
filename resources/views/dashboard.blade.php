<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --danger: #f72585;
            --success: #4cc9f0;
            --warning: #f8961e;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #dee2e6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
        }

        .main-content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 35px;
            height: 35px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .stat-title {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-diff {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-diff.up {
            color: var(--success);
        }

        .stat-diff.down {
            color: var(--danger);
        }

        .dashboard-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            margin-bottom: 5px;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .stock-alert-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
        }

        .stock-alert-item:last-child {
            border-bottom: none;
        }

        .stock-product {
            flex: 1;
        }

        .stock-progress {
            width: 150px;
            height: 8px;
            background-color: var(--light);
            border-radius: 4px;
            overflow: hidden;
            margin: 0 15px;
        }

        .stock-progress-bar {
            height: 100%;
            background-color: var(--danger);
        }

        .stock-value {
            width: 60px;
            text-align: right;
            font-weight: 500;
            color: var(--danger);
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="main-content">


        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title"><i class="fas fa-boxes"></i><span>Total Produk</span></div>
                <div class="stat-value">1,248</div>
                <div class="stat-diff up"><i class="fas fa-arrow-up"></i><span>24 dari bulan lalu</span></div>
            </div>
            <div class="stat-card">
                <div class="stat-title"><i class="fas fa-box-open"></i><span>Stok Tersedia</span></div>
                <div class="stat-value">5,742</div>
                <div class="stat-diff down"><i class="fas fa-arrow-down"></i><span>56 dari bulan lalu</span></div>
            </div>
            <div class="stat-card">
                <div class="stat-title"><i class="fas fa-exclamation-triangle"></i><span>Stok Rendah</span></div>
                <div class="stat-value">42</div>
                <div class="stat-diff up"><i class="fas fa-arrow-up"></i><span>8 dari minggu lalu</span></div>
            </div>
            <div class="stat-card">
                <div class="stat-title"><i class="fas fa-times-circle"></i><span>Stok Habis</span></div>
                <div class="stat-value">15</div>
                <div class="stat-diff down"><i class="fas fa-arrow-down"></i><span>3 dari minggu lalu</span></div>
            </div>
        </div>

        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Aktivitas Terakhir</h2>
                <a href="#">Lihat Semua</a>
            </div>
            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-icon"><i class="fas fa-plus"></i></div>
                    <div class="activity-content">
                        <div class="activity-text"><strong>Admin</strong> menambahkan produk baru <strong>Meja Kerja
                                Malm</strong></div>
                        <div class="activity-time">10 menit yang lalu</div>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon"><i class="fas fa-edit"></i></div>
                    <div class="activity-content">
                        <div class="activity-text"><strong>Admin</strong> memperbarui stok <strong>Lampu
                                Tertial</strong></div>
                        <div class="activity-time">1 jam yang lalu</div>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon"><i class="fas fa-user-plus"></i></div>
                    <div class="activity-content">
                        <div class="activity-text"><strong>Admin</strong> menambahkan user baru <strong>Cam</strong>
                        </div>
                        <div class="activity-time">3 jam yang lalu</div>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon"><i class="fas fa-calculator"></i></div>
                    <div class="activity-content">
                        <div class="activity-text"><strong>Pegawai</strong> melakukan perhitungan inventaris</div>
                        <div class="activity-time">5 jam yang lalu</div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">Stok Hampir Habis</h2>
                <a href="#">Lihat Semua</a>
            </div>
            <div>
                <div class="stock-alert-item">
                    <div class="stock-product">Lemari Pax</div>
                    <div class="stock-progress">
                        <div class="stock-progress-bar" style="width: 15%"></div>
                    </div>
                    <div class="stock-value">5 tersisa</div>
                </div>
                <div class="stock-alert-item">
                    <div class="stock-product">Kursi Ergonomis</div>
                    <div class="stock-progress">
                        <div class="stock-progress-bar" style="width: 25%"></div>
                    </div>
                    <div class="stock-value">10 tersisa</div>
                </div>
                <div class="stock-alert-item">
                    <div class="stock-product">Meja Makan</div>
                    <div class="stock-progress">
                        <div class="stock-progress-bar" style="width: 5%"></div>
                    </div>
                    <div class="stock-value">2 tersisa</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
