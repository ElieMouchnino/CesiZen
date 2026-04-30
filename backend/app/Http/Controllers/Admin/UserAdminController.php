<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'in:user,admin'],
            'is_active' => ['nullable'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect('/admin/users')->with('success', 'Utilisateur créé.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.*\S.*/'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:user,admin'],
            'is_active' => ['nullable'],
        ]);

        if (auth()->id() === $user->id && !$request->has('is_active')) {
            return back()->withErrors([
                'is_active' => 'Vous ne pouvez pas désactiver votre propre compte.'
            ])->withInput();
        }

        if (auth()->id() === $user->id && $validated['role'] !== 'admin') {
            return back()->withErrors([
                'role' => 'Vous ne pouvez pas retirer votre propre rôle administrateur.'
            ])->withInput();
        }

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'is_active' => $request->has('is_active'),
        ]);

        return redirect('/admin/users')->with('success', 'Utilisateur modifié.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect('/admin/users')->with('success', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return redirect('/admin/users')->with('success', 'Utilisateur supprimé.');
    }
}