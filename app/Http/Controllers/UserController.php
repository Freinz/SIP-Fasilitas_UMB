<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // Show add user form
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('superadmin.input_user', compact('roles'));
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:255',
            'nim_nip' => 'nullable|string|max:255',
            'ktm_number' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'password' => 'nullable|string|min:6',
            'role' => 'required|exists:roles,name',
        ]);

        $validated['password'] = bcrypt($request->input('password', '12345678'));
        $roleName = $validated['role'];
        unset($validated['role']);
        $user = User::create($validated);
        $user->assignRole($roleName);
        Alert::success('Sukses', 'User berhasil ditambahkan');
        return redirect()->route('users.show');
    }

    // Show edit user form
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        $userRole = $data->roles->pluck('name')->first();
        return view('superadmin.update_user', compact('data', 'roles', 'userRole'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:255',
            'nim_nip' => 'nullable|string|max:255',
            'ktm_number' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'role' => 'required|exists:roles,name',
        ]);
        $roleName = $validated['role'];
        unset($validated['role']);
        $user->update($validated);
        $user->syncRoles([$roleName]);
        Alert::success('Sukses', 'User berhasil diperbarui');
        return redirect()->route('users.show');
    }

    // Delete user by id
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Sukses', 'User berhasil dihapus');
        return redirect()->route('users.show');
    }

    // Show all users for superadmin
    public function show()
    {
        $users = User::all();
        return view('superadmin.show_user', compact('users'));
    }
}
