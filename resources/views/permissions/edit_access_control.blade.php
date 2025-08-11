@extends('layouts.main')
@section('title', 'Kelola Akses User')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Kelola Akses: {{ $user->name }}</h5></div>
    <div class="card-body">
        <form action="{{ route('access.control.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="roles" class="form-label">Role</label>
                <select name="roles[]" id="roles" class="form-control" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">* Tekan Ctrl untuk memilih lebih dari satu</small>
            </div>
            <div class="mb-3">
                <label for="permissions" class="form-label">Permission</label>
                <select name="permissions[]" id="permissions" class="form-control" multiple>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}" {{ $user->permissions->contains('name', $permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">* Tekan Ctrl untuk memilih lebih dari satu</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('access.control') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
