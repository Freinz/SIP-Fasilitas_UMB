@extends('layouts.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Form')
@section('breadcrumb-item-active', 'Daftarkan User')

@section('css')
<!-- Any additional CSS -->
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Lengkapi Data</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('store_user_superadmin') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="phone">No. HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Masukkan No. HP" value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nim_nip">NIM/NIP</label>
                                <input type="text" class="form-control @error('nim_nip') is-invalid @enderror" name="nim_nip" id="nim_nip" placeholder="Masukkan NIM/NIP" value="{{ old('nim_nip') }}">
                                @error('nim_nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="user_type">Role User</label>
                                <select class="form-control" name="user_type" id="user_type" required>
                                    <option value="">Pilih Role</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="admin_rt">Admin RT</option>
                                    <option value="admin_umum">Admin Umum</option>
                                    <option value="pimpinan">Pimpinan</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="ktm_number">No. KTM</label>
                                <input type="text" class="form-control @error('ktm_number') is-invalid @enderror" name="ktm_number" id="ktm_number" placeholder="Masukkan No. KTM" value="{{ old('ktm_number') }}">
                                @error('ktm_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="is_active">Status Aktif</label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Tidak Aktif</option>
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
