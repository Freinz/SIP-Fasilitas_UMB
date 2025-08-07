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
        return view('superadmin.input_user');
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:255',
            'nim_nip' => 'nullable|string|max:255',
            'user_type' => 'required|in:mahasiswa,admin_rt,admin_umum,pimpinan,superadmin',
            'ktm_number' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'password' => 'nullable|string|min:6',
        ]);

        $validated['password'] = bcrypt($request->input('password', '12345678'));
        $user = User::create($validated);
        
        Alert::success('Sukses', 'User berhasil ditambahkan');
        return redirect()->route('users.show');
    }

    // Show edit user form
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('superadmin.update_user', compact('data'));
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
            'user_type' => 'required|in:mahasiswa,admin_rt,admin_umum,pimpinan,superadmin',
            'ktm_number' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);
        $user->update($validated);
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
