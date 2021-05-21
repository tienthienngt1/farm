@extends('layouts.app')

@section('content')
<div class="container body2 load-hidden">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header"><center><h1>ĐĂNG KÍ</h1></center></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Họ và tên</label>

                            <div class="col-md-6">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text" id="basic-addon10"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus aria-describedby="basic-addon10">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                               <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text" id="basic-addon11"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" aria-describedby="basic-addon11">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __(' Mật khẩu ') }}</label>

                            <div class="col-md-6">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text" id="basic-addon12"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" aria-describedby="basic-addon12">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' Nhập lại mật khẩu ') }}</label>

                            <div class="col-md-6">
                             <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon14"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" aria-describedby ="basic-addon14">
                            </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" onclick="snipper()" id="reg">
                                    Đăng kí
                                </button>
                            </div>
                        </div>
                    </form>
                    <center>
                      <a class="btn btn-link" href="{{ route('login') }}" >Đã có tài khoản ?</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>


<button id="myP" class="btn btn-primary" type="button" disabled hidden>
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Đăng kí...
</button>

@endsection
