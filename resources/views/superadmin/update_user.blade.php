@extends('layouts.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Form')
@section('breadcrumb-item-active', 'Perbarui Data User')

@section('css')
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Perbarui Data</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('user_edit', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Nama User</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $data->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $data->email) }}" readonly>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">No. HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $data->phone) }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="nim_nip">NIM/NIP</label>
                                <input type="text" class="form-control @error('nim_nip') is-invalid @enderror" name="nim_nip" value="{{ old('nim_nip', $data->nim_nip) }}">
                                @error('nim_nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="user_type">Role User</label>
                                <select class="form-control" name="user_type" id="user_type" required>
                                    <option value="">Pilih Role</option>
                                    <option value="mahasiswa" {{ $data->user_type == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                    <option value="admin_rt" {{ $data->user_type == 'admin_rt' ? 'selected' : '' }}>Admin RT</option>
                                    <option value="admin_umum" {{ $data->user_type == 'admin_umum' ? 'selected' : '' }}>Admin Umum</option>
                                    <option value="pimpinan" {{ $data->user_type == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                                    <option value="superadmin" {{ $data->user_type == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ktm_number">No. KTM</label>
                                <input type="text" class="form-control @error('ktm_number') is-invalid @enderror" name="ktm_number" value="{{ old('ktm_number', $data->ktm_number) }}">
                                @error('ktm_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="is_active">Status Aktif</label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1" {{ $data->is_active ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$data->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection
