@extends('layouts.main')

@section('title', 'Perbarui Role')
@section('breadcrumb-item', 'Form')
@section('breadcrumb-item-active', 'Perbarui Data Role')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Perbarui Data Role</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('roles.update', $data->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label class="form-label" for="name">Nama Role</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $data->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
