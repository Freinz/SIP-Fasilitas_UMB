@extends('layouts.main')

@section('title', 'Approval Peminjaman')
@section('breadcrumb-item', 'Approval')
@section('breadcrumb-item-active', 'Daftar Pengajuan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Pengajuan Peminjaman untuk Approval</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pengajuan</th>
                            <th>Peminjam</th>
                            <th>Jenis</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loanRequests as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->request_number }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->loan_type }}</td>
                            <td>{{ $item->start_date }} s/d {{ $item->end_date }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('loan.approval.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengajuan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
