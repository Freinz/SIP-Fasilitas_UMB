@extends('layouts.main')
@section('title', 'Permission Settings')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Permission Settings</h5></div>
    <div class="card-body">
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Tambah Permission</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Permission Name</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @foreach($permission->roles as $role)
                            <span class="badge bg-info">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus permission ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h5>Assign Permission to Role</h5>
        <form action="{{ route('permissions.assign') }}" method="POST" class="row g-3 align-items-center">
            @csrf
            <div class="col-auto">
                <select name="role_id" class="form-control" required>
                    <option value="">Pilih Role</option>
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <select name="permission_id" class="form-control" required>
                    <option value="">Pilih Permission</option>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Assign</button>
            </div>
        </form>
    </div>
</div>
@endsection
