<form method="POST" action="{{ route('profile.update') }}" class="form">
    @csrf
    @method('PATCH')

    <!-- Nama -->
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            value="{{ old('name', auth()->user()->name) }}" required autofocus>
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            value="{{ old('email', auth()->user()->email) }}" required>
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Tombol -->
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </div>
</form>
