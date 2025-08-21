@extends('layouts.main')

@section('title', 'Riwayat Peminjaman Ruangan')
@section('breadcrumb-item', 'Peminjaman')
@section('breadcrumb-item-active', 'Riwayat')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Riwayat Peminjaman Ruangan Saya</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pengajuan</th>
                            <th>Ruangan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loanRequests as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->request_number }}</td>
                            <td>
                                @if($item->loanRooms && $item->loanRooms->first())
                                    {{ $item->loanRooms->first()->room->name ?? '-' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->start_date }} s/d {{ $item->end_date }}</td>
                            <td>{{ $item->status }}</td>
                            <td><a href="{{ route('loan.room.history.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada riwayat peminjaman</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
