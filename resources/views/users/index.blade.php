<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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

        .header h1 {
            color: var(--primary);
            font-size: 1.75rem;
        }

        .btn-add {
            padding: 8px 15px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #3a56d4;
        }

        .user-list {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .user-list-header {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--light);
            border-bottom: 1px solid var(--border);
        }

        .user-list-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .user-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-light);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
        }

        .user-details {
            flex: 1;
        }

        .user-name {
            font-weight: 500;
            margin-bottom: 3px;
        }

        .user-email {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .user-role {
            display: inline-block;
            padding: 3px 8px;
            background-color: var(--light);
            border-radius: 4px;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .user-actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: opacity 0.3s;
        }

        .btn-edit {
            background-color: var(--primary);
            color: white;
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.9;
        }
    </style>

    <div class="main-content">

        {{-- Daftar User --}}
        <div class="user-list">
            <div class="user-list-header">
                <div class="user-list-title">Daftar Pengguna</div>
                <a href="/users/create" button class="btn-add" id="btn-add-header" type="button">
                    <i class="fas fa-plus"></i>
                    Tambah User
                </a>
            </div>

            {{-- Static contoh --}}
            <div class="user-item">
                <div class="user-details">
                    <div class="user-name">Admin</div>
                    <div class="user-email">admin@example.com</div>
                </div>
                <div class="user-actions">
                    <button class="btn-edit" type="button">Edit</button>
                    <button class="btn-delete" type="button">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Semua tombol hanya statis, tidak ada redirect atau route
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                        alert('User akan dihapus (statis)');
                    }
                });
            });
        });
    </script>
</x-app-layout>
