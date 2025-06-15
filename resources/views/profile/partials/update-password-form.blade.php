<form method="POST" action="{{ route('user-password.update') }}">
    @csrf
    @method('PUT')

    <!-- Password Lama -->
    <div class="form-group">
        <label for="current_password">Password Sekarang</label>
        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror"
            name="current_password" required autocomplete="current-password">
        @error('current_password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password Baru -->
    <div class="form-group">
        <label for="password">Password Baru</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Konfirmasi -->
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password Baru</label>
        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required
            autocomplete="new-password">
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-warning">
            <i class="fas fa-key"></i> Ubah Password
        </button>
    </div>
</form>
