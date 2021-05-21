@extends('layouts.app')

@section('content')
<div class="body2 hidden">
  @isset($id)
  <a class="mt_5" href="/home/setting">
    <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%" />
  </a>
  <div class="card">

    @if($id == 1)
    <x-home.setting.pay-component :withdraw="$withdraw" />
    @elseif($id == 2)
    <x-home.setting.history-component :deposit="$deposit" />
    @elseif($id == 3)
    <x-home.setting.refferal-component :ref="$ref" />
    @elseif($id == 4)
    <x-home.setting.changepass-component />
    @elseif($id == 5)
    <x-home.setting.level-component :level='$level' />
    @endif

  </div>
  @else
  <a class="mt_5" href="{{ route('home') }}">
    <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%" />
  </a>
  <div class="card">
    <div class="card-header">
      <center>
        <h2> Cài đặt thông tin </h2>
      </center>
    </div>

    <div class="card-body">

      <a class="btn btn-link" href="setting/1"><h4><i class="fas fa-history mr-3"></i>Lịch sử rút tiền</h4></a>
      <hr>
      <a class="btn btn-link" href="setting/2"><h4><i class="fas fa-history mr-3"></i>Lịch sử nạp tiền</h4></a>
      <hr>
      <a class="btn btn-link" href="setting/3"><h4><i class="fas fa-users mr-3"></i>Hệ thống giới thiệu</h4></a>
      <hr>
      <a class="btn btn-link" href="setting/5"><h4><i class="fas fa-users mr-3"></i>Thông tin cấp bậc</h4></a>
      <hr>
      <a class="btn btn-link" href="setting/4"><h4><i class="fas fa-key mr-3"></i>Đổi mật khẩu</h4></a>
    </div>
    @endisset
  </div>
  @endsection