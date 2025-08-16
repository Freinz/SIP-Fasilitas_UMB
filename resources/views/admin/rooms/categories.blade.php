@extends('layouts.main')

@section('title', 'Kategori Ruangan')
@section('breadcrumb-item', 'Rooms')
@section('breadcrumb-item-active', 'Room Categories')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Kategori Ruangan</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(isset($category))
            <form action="{{ route('rooms.categories.update', $category->id) }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="col-md-5">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-warning">Update Kategori</button>
                        <a href="{{ route('rooms.categories') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        @else
            <form action="{{ route('rooms.categories') }}" method="POST" class="mb-4">
                @csrf
                <div class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-md-5">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </div>
                </div>
            </form>
        @endif

        <h6>Daftar Kategori Ruangan</h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>
                            @if($cat->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rooms.categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('rooms.categories.delete', $cat->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus kategori?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
