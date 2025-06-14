<x-layout>
    <x-slot:title>Tambah Product</x-slot:title>

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option>Belum ada Category</option>
                                    @endforelse
                                </select>
                            </div>

                            <x-text-input label="Nama" name="name" placeholder="Masukkan nama product"
                                value="{{ old('name') }}"></x-text-input>

                            <x-text-input label="Harga" name="price" type='number'
                                placeholder="Masukkan harga product" value="{{ old('price') }}"></x-text-input>

                            <div class="mb-3">
                                <label for="image" class="form-label">Masukkan Image Product</label>
                                <input class="form-control" type="file" id="image" name="image"
                                    accept="image/jpeg,image/png">
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="active"
                                    name="active" checked>
                                <label class="form-check-label" for="active">Aktif</label>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('products.index') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
