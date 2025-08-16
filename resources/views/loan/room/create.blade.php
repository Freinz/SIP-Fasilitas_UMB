@extends('layouts.main')

@section('title', 'Pengajuan Peminjaman Ruangan')
@section('breadcrumb-item', 'Peminjaman')
@section('breadcrumb-item-active', 'Ruangan')
@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Form Pengajuan Peminjaman Ruangan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('loan.room.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="room_id">Pilih Ruangan</label>
                        <select class="form-control" name="room_id" id="room_id" required>
                            <option value="">-- Pilih Ruangan --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="loan_date">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="loan_date" id="loan_date" required>
                    </div>
                    <div class="form-group">
                        <label for="return_date">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="return_date" id="return_date" required>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Keperluan</label>
                        <textarea class="form-control" name="purpose" id="purpose" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="document">Upload Dokumen (opsional)</label>
                        <input type="file" class="form-control" name="document" id="document">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
