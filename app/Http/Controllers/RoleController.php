<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    // Show all roles
    public function show()
    {
        $roles = Role::all();
        return view('superadmin.show_role', compact('roles'));
    }

    // Show add role form
    public function create()
    {
        return view('superadmin.input_role');
    }

    // Store new role
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $validated['guard_name'] = 'web';
        Role::create($validated);
        Alert::success('Sukses', 'Role berhasil ditambahkan');
        return redirect()->route('roles.show');
    }

    // Show edit role form
    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('superadmin.update_role', compact('data'));
    }

    // Update role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $validated['guard_name'] = 'web';
        $role->update($validated);
        Alert::success('Sukses', 'Role berhasil diperbarui');
        return redirect()->route('roles.show');
    }

    // Delete role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        Alert::success('Sukses', 'Role berhasil dihapus');
        return redirect()->route('roles.show');
    }
}
