<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionSettingsController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('roles')->get();
        return view('permissions.permission_settings', compact('permissions'));
    }

    // Show add permission form
    public function create()
    {
        return view('permissions.input_permission');
    }

    // Store new permission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'required|string|max:255',
        ]);
        Permission::create($validated);
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Permission berhasil ditambahkan');
        return redirect()->route('permission.settings');
    }

    // Show edit permission form
    public function edit($id)
    {
        $data = Permission::with('roles')->findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        return view('permissions.update_permission', compact('data', 'roles'));
    }

    // Update permission
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);
        $permission->update(['name' => $validated['name']]);
        // Update roles terkait
        $roles = $request->input('roles', []);
        $permission->roles()->sync([]); // Unassign semua role dulu
        foreach ($roles as $roleName) {
            $role = \Spatie\Permission\Models\Role::where('name', $roleName)->first();
            if ($role) {
                $role->givePermissionTo($permission->name);
            }
        }
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Permission dan role terkait berhasil diperbarui');
        return redirect()->route('permission.settings');
    }

    // Delete permission
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Permission berhasil dihapus');
        return redirect()->route('permission.settings');
    }

    // Assign permission to role
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);
        $role = \Spatie\Permission\Models\Role::findOrFail($validated['role_id']);
        $permissions = Permission::whereIn('id', $validated['permission_ids'])->pluck('name')->toArray();
        $role->givePermissionTo($permissions);
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Permission berhasil di-assign ke role');
        return redirect()->route('permission.settings');
    }
}
