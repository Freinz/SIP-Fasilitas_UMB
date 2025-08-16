@extends('layouts.main')

@section('title', 'Tambah Ruangan')
@section('breadcrumb-item', 'Rooms')
@section('breadcrumb-item-active', 'Add Room')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Ruangan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="category_id">Kategori Ruangan <span class="text-danger">*</span></label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="name">Nama Ruangan</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group mb-2">
                <label for="code">Kode Ruangan</label>
                <input type="text" class="form-control" name="code" id="code" required>
            </div>
            <div class="form-group mb-2">
                <label for="capacity">Kapasitas</label>
                <input type="number" class="form-control" name="capacity" id="capacity" required>
            </div>
            <div class="form-group mb-2">
                <label for="location">Lokasi</label>
                <input type="text" class="form-control" name="location" id="location">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
