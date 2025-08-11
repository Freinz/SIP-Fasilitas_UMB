@extends('layouts.main')
@section('title', 'Tambah Permission')
@section('content')
<div class="card mt-4">
    <div class="card-header"><h5>Tambah Permission</h5></div>
    <div class="card-body">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Permission</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="guard_name" class="form-label">Guard Name</label>
                <input type="text" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror" value="{{ old('guard_name', 'web') }}" required>
                @error('guard_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('permission.settings') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
