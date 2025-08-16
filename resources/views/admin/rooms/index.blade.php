@extends('layouts.main')

@section('title', 'Daftar Ruangan')
@section('breadcrumb-item', 'Rooms')
@section('breadcrumb-item-active', 'Room List')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Ruangan</h5>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary float-end">Tambah Ruangan</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->category ? $room->category->name : '-' }}</td>
                    <td>{{ $room->code }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->location }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
