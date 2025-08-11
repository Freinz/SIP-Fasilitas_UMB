@extends('layouts.main')
@section('title', 'Access Control')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Access Control</h5></div>
    <div class="card-body">
        <h6>Roles</h6>
        <ul>
            @foreach($roles as $role)
            <li>{{ $role->name }}</li>
            @endforeach
        </ul>
        <h6>Permissions</h6>
        <ul>
            @foreach($permissions as $permission)
            <li>{{ $permission->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
