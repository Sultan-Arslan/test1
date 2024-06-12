<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('roles');

        if ($request->filled('role')) {
            $role = $request->input('role');
            $query->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            });
        }

        if ($request->filled('username')) {
            $username = $request->input('username');
            $query->where('name', 'like', '%' . $username . '%');
        }

        if ($request->filled('email')) {
            $email = $request->input('email');
            $query->where('email', 'like', '%' . $email . '%');
        }

        $users = $query->paginate(10); // Используем пагинацию
        $roles = Role::all();

        return view('user_roles.index', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }

        $user->syncRoles($request->roles);
        $user->save();

        return redirect()->route('user_roles.index')->with('success', 'User roles and photo updated successfully.');
    }

    public function deletePhoto(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
            $user->photo = null;
            $user->save();
        }

        return redirect()->route('user_roles.index')->with('success', 'User photo deleted successfully.');
    }
}
