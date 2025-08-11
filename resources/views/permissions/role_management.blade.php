@extends('layouts.main')
@section('title', 'Role Management')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Role Management</h5></div>
    <div class="card-body">
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Tambah Role</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus role ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
