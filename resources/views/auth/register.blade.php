@extends('layouts.index')

@section('content')
<div class="bg-full-home d-flex justify-content-center align-items-center h-100 p-2">    
    <div class="container bg-light h-75 w-50 p-3 rounded d-flex flex-column justify-content-center ">
        <div class="text-center my-2">
            <h2 class="font-weight-bold">Registrasi</h2>
            <span>Registrasi akun anda dengan mengisi data diri anda</span>
            <hr width="80%">
        </div>
        <div>
            <form action="{{ route('register') }}" method="post" class="d-flex flex-column justify-content-center align-items-center">
                @csrf
                <div class="row w-100">
                    <div class="form-group col">
                        <label for="username">{{__("Username")}}</label>
                        <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan nama pengguna yang terdaftar" aria-describedby="usernameid" autocomplete="username" required autofocus>
                        @error('username')
                        <small id="usernameid" class="text-danger m-0">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-groupm col">
                      <label for="email">{{__("Email")}}</label>
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email" aria-describedby="email" required autofocus autocomplete="email">
                      @error('email')
                      <small id="email" class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="form-group col">
                      <label for="password">{{__("Password")}}</label>
                      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" aria-describedby="passwordid" required autofocus autocomplete="new-password">
                      @error('password')
                      <small id="passwordid" class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group col">
                      <label for="password_confirmation">{{__('Konfirmasi Password')}}</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password" aria-describedby="confirmpassword">
                      @error('password_confirmation')
                      <small id="confirmpassword" class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                </div>
                <div class="w-100 p-3">
                    <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                    <a role="button" href="{{ route('login') }}" class="btn btn-outline-secondary btn-block">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection