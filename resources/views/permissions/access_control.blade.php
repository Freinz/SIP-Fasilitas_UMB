@extends('layouts.main')
@section('title', 'Access Control')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Access Control</h5></div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Roles</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}<br><small>{{ $user->email }}</small></td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($user->permissions as $permission)
                            <span class="badge bg-info">{{ $permission->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('access.control.edit', $user->id) }}" class="btn btn-sm btn-warning">Kelola</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
