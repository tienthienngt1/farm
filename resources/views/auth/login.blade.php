@extends('layouts.app')

@section('content')

 <span class="glyphicon glyphicon-envelope"></span>
<div class="container body3 load-hidden">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header"><center><h1>ĐĂNG NHẬP</h1></center></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @error('banned')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus aria-describedby="basic-addon1">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __(' Mật khẩu') }}</label>

                            <div class="col-md-6">
                              
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" aria-describedby="basic-addon2">
                               </div >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu ?') }}
                                    </a>
                                @endif
                                
                                <button id ="reg" type="submit" class="btn btn-primary" onclick="snipper()">
                                    Đăng nhập
                                </button>
                                
                            </div>
                        </div>
                    </form>
                    <center>
                      <a class="btn btn-link" href="{{ route('register') }}">Chưa có tài khoản ?</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<button id="myP" class="btn btn-primary" type="button" disabled hidden>
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Đăng nhập...
</button>
@endsection
