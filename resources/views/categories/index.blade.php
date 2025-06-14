<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Kategori
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --danger: #f72585;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #dee2e6;
        }

        body {
            background: #f5f7fa;
        }

        .category-container {
            max-width: 950px;
            margin: 32px auto;
            padding: 32px 24px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(67, 97, 238, 0.08), 0 1.5px 6px rgba(67, 97, 238, 0.04);
        }

        .category-toolbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 16px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #4361ee 60%, #4895ef 100%);
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(67, 97, 238, 0.08);
            transition: background 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #4895ef 60%, #4361ee 100%);
            box-shadow: 0 4px 16px rgba(67, 97, 238, 0.13);
        }

        .search-box {
            position: relative;
            width: 320px;
            max-width: 100%;
        }

        .search-box input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            background: #f8f9fa;
            transition: border 0.2s;
        }

        .search-box input:focus {
            border: 1.5px solid var(--primary);
            outline: none;
            background: #fff;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 16px;
        }

        .category-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(67, 97, 238, 0.07);
            overflow-x: auto;
        }

        .category-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 700px;
        }

        .category-table th,
        .category-table td {
            padding: 14px 18px;
            text-align: left;
        }

        .category-table th {
            background: #f5f7fa;
            font-weight: 700;
            color: #4361ee;
            border-bottom: 2px solid var(--border);
            font-size: 15px;
        }

        .category-table td {
            background: #fff;
            font-size: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .category-table tr:last-child td {
            border-bottom: none;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn-edit,
        .btn-delete {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: #fff;
            border: none;
            font-size: 16px;
            transition: background 0.2s, transform 0.2s;
            cursor: pointer;
        }

        .btn-edit {
            background: #4895ef;
        }

        .btn-edit:hover {
            background: #4361ee;
            transform: scale(1.07);
        }

        .btn-delete {
            background: #f72585;
        }

        .btn-delete:hover {
            background: #c41e5c;
            transform: scale(1.07);
        }

        @media (max-width: 900px) {
            .category-container {
                padding: 18px 4vw;
            }

            .category-table {
                min-width: 600px;
            }
        }

        @media (max-width: 600px) {
            .category-container {
                padding: 8px 0;
            }

            .category-toolbar {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .search-box {
                width: 100%;
            }

            .category-table {
                min-width: 400px;
            }
        }
    </style>

    <div class="category-container">
        <div class="category-toolbar">
            <a href="#" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
            <div class="search-box">
                <input type="text" placeholder="Cari kategori...">
                <i class="fas fa-search"></i>
            </div>
        </div>
        <div class="category-card">
            <table class="category-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ([['id' => 1, 'nama' => 'Furniture', 'desc' => 'Meja, kursi, lemari'], ['id' => 2, 'nama' => 'Elektronik', 'desc' => 'Lampu, kabel, aksesoris'], ['id' => 3, 'nama' => 'Dekorasi', 'desc' => 'Hiasan dinding, vas'], ['id' => 4, 'nama' => 'Perlengkapan', 'desc' => 'Alat tulis, kebutuhan kantor']] as $kategori)
                        <tr>
                            <td>{{ $kategori['id'] }}</td>
                            <td>{{ $kategori['nama'] }}</td>
                            <td>{{ $kategori['desc'] }}</td>
                            <td class="actions">
                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete" title="Hapus"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
