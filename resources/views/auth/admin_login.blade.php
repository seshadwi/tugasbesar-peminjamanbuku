@extends('layouts.index')

@section('content')
<div class="bg-full-home d-flex justify-content-center align-items-center h-100 p-2">    
    <div class="container bg-light h-75 w-25 p-3 rounded d-flex flex-column justify-content-center ">
        <div class="text-center my-2">
            <h2 class="font-weight-bold">Login Admin</h2>
            <span>Login admin hanya untuk pengelola saja</span>
            <hr>
        </div>
        <div>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                  <label for="username">{{__("Username")}}</label>
                  <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan nama pengguna yang terdaftar" aria-describedby="usernameid" autocomplete="username" required autofocus>
                  @error('username')
                  <small id="usernameid" class="text-danger m-0">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">{{__("Password")}}</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password dengan benar" aria-describedby="passwordId" autocomplete="current-password" required autofocus>
                  @error('password')
                  <small id="passwordId" class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
        
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block ">Login</button>
                    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block" role="button">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection