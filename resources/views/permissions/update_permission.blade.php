@extends('layouts.main')
@section('title', 'Edit Permission')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Edit Permission</h5></div>
    <div class="card-body">
        <form action="{{ route('permissions.update', $data->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Permission</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="roles" class="form-label">Role Terkait</label>
                <select name="roles[]" id="roles" class="form-control" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $data->roles->contains('name', $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">* Tekan Ctrl untuk memilih lebih dari satu</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('permission.settings') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
