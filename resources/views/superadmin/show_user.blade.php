@extends('layouts.main')

@section('title', 'All Users')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h5>All Users</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>NIM/NIP</th>
                    <th>User Type</th>
                    <th>Active</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->nim_nip ?? '-' }}</td>
                    <td>{{ $user->user_type_label }}</td>
                    <td>{{ $user->is_active_label }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
