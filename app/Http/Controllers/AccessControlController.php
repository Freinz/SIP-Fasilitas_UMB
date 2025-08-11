<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccessControlController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::with(['roles', 'permissions'])->get();
        return view('permissions.access_control', compact('users'));
    }

    public function edit($id)
    {
        $user = \App\Models\User::with(['roles', 'permissions'])->findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permissions.edit_access_control', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->syncRoles($request->input('roles', []));
        $user->syncPermissions($request->input('permissions', []));
        \RealRashid\SweetAlert\Facades\Alert::success('Sukses', 'Akses user berhasil diperbarui');
        return redirect()->route('access.control');
    }
}
