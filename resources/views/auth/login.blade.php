@extends('layouts.AuthLayout')

@section('title', 'Login')

@section('content')
    <div class="auth-form">
        <div class="card my-5">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ URL::asset('image/umb-logo.png') }}" alt="images" style="max-width:180px; height:auto;" class="img-fluid mb-3 mx-auto d-block">
                    <h4 class="f-w-500 mb-1">Login with your email</h4>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@phoenixcoded.com" required autocomplete="email" autofocus id="floatingInput" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" type="password" class="form-control @error('password') is-invalid @enderror" value="12345678" name="password" required autocomplete="current-password" id="floatingInput1" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="d-flex mt-1 justify-content-between align-items-center">
                     
                        
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
               
                
            </div>
        </div>
    </div>
@endsection
