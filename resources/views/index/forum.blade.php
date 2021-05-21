@extends('layouts.app')

@section('content')

<div class="container-fluid body3 load-hidden" >
    <div class="card bg-none mt-5">
      <div class="card-header">
        <h1>Chuyên mục</h1>
      </div>
      <div class="card-body">
          <a class="btn btn-link" href="/forum/1">
            <h3>Hỏi đáp  <span class="badge badge-secondary">{{ $data['hd'] }}</span></h3>
          </a>
      </div>
      <div class="card-body">
          <a class="btn btn-link" href="/forum/2">
            <h3>Thanh toán  <span class="badge badge-secondary">{{ $data['th'] }}</span></h3>
          </a>
      </div>
      <div class="card-body">
          <a class="btn btn-link" href="/forum/3">
            <h3>Trò chuyện  <span class="badge badge-secondary">{{ $data['tc'] }}</span></h3>
          </a>
      </div>
      <div class="card-body">
          <a class="btn btn-link" href="/forum/4">
            <h3>Kết bạn <span class="badge badge-secondary">{{ $data['kb'] }}</span></h3>
          </a>
      </div>
    </div>
</div>

@endsection