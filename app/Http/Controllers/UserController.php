<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id_user')->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Admin,Operator',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
            'role' => 'required|in:Admin,Operator',
        ]);

        $data = [
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}