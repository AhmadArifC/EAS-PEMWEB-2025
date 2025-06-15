<form method="POST" action="{{ route('profile.destroy') }}"
    onsubmit="return confirm('Yakin ingin menghapus akun Anda?');">
    @csrf
    @method('DELETE')

    <p class="text-danger">Akun Anda akan dihapus secara permanen beserta semua data yang terkait.</p>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-sm btn-danger btn-delete-confirm">
            <i class="fas fa-user-slash"></i> Hapus Akun
        </button>
    </div>
</form>
