@extends('layouts.main')

@section('title', 'Detail Riwayat Peminjaman')
@section('breadcrumb-item', 'Peminjaman')
@section('breadcrumb-item-active', 'Detail Riwayat')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Detail Pengajuan</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr><th>Nomor Pengajuan</th><td>{{ $loanRequest->request_number }}</td></tr>
                    <tr><th>Ruangan</th><td>
                        @if($loanRequest->loanRooms && $loanRequest->loanRooms->first())
                            {{ $loanRequest->loanRooms->first()->room->name ?? '-' }}
                        @else
                            -
                        @endif
                    </td></tr>
                    <tr><th>Tanggal Pinjam</th><td>{{ $loanRequest->start_date }} s/d {{ $loanRequest->end_date }}</td></tr>
                    <tr><th>Keperluan</th><td>{{ $loanRequest->purpose }}</td></tr>
                    <tr><th>Status</th><td>{{ $loanRequest->status }}</td></tr>
                </table>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h5>Riwayat Approval</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Nama Approver</th>
                            <th>Aksi</th>
                            <th>Catatan</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($approvals as $appr)
                        <tr>
                            <td>{{ $appr->approver_role }}</td>
                            <td>{{ $appr->approver->name ?? '-' }}</td>
                            <td>{{ ucfirst($appr->action) }}</td>
                            <td>{{ $appr->notes }}</td>
                            <td>{{ $appr->action_at }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center">Belum ada riwayat approval</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
