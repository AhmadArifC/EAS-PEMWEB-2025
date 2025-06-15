<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data); // Simpan ke variabel untuk log

        // ✅ Log aktivitas
        ActivityLog::create([
            'user_id'     => Auth::id(),
            'action'      => "Menambahkan user: {$user->name}",
            'subject_type'=> User::class,
            'subject_id'  => $user->id,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($data['password'] ?? false) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        // ✅ Log aktivitas
        ActivityLog::create([
            'user_id'     => Auth::id(),
            'action'      => "Mengubah user: {$user->name}",
            'subject_type'=> User::class,
            'subject_id'  => $user->id,
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // ✅ Log aktivitas SEBELUM dihapus agar datanya masih bisa diakses
        ActivityLog::create([
            'user_id'     => Auth::id(),
            'action'      => "Menghapus user: {$user->name}",
            'subject_type'=> User::class,
            'subject_id'  => $user->id,
        ]);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
