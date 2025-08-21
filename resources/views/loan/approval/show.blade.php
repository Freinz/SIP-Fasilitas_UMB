@extends('layouts.main')

@section('title', 'Detail Approval Peminjaman')
@section('breadcrumb-item', 'Approval')
@section('breadcrumb-item-active', 'Detail Pengajuan')
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
                    <tr><th>Peminjam</th><td>{{ $loanRequest->user->name ?? '-' }}</td></tr>
                    <tr><th>Jenis</th><td>{{ $loanRequest->loan_type }}</td></tr>
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
        <div class="card">
            <div class="card-header">
                <h5>Proses Approval</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('loan.approval.action', $loanRequest->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Aksi</label>
                        <select name="action" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="approve">Approve</option>
                            <option value="reject">Reject</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Catatan (Opsional)</label>
                        <textarea name="notes" class="form-control" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Proses</button>
                    <a href="{{ route('loan.approval.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
