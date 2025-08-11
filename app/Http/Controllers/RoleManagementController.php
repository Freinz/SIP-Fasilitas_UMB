<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleManagementController extends Controller
{
    // Show all roles
    public function index()
    {
        $roles = Role::all();
        return view('permissions.role_management', compact('roles'));
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
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Role berhasil ditambahkan');
        return redirect()->route('role.management');
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
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Role berhasil diperbarui');
        return redirect()->route('role.management');
    }

    // Delete role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Role berhasil dihapus');
        return redirect()->route('role.management');
    }
}
