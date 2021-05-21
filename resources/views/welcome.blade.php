@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <div class="row justify-content-center p-3">
    <div class="col-md-12">
      <img src="{{ asset('images/autumn.png') }}" tittle="background" width="100%" />
    </div>
  </div>

  <div class="card bg-none mt-2 shadow">
    <div class="card-header">
      <div class="class_main">
        <div class="body_header" id="title_farm">
          <h1>Game nông trại</h1>
        </div>
        <hr />
        <div>
          <ui>
            <li>
              Bạn là một người nông dân đam mê với nghê trồng rau, nuôi cá. Trong game bạn sẽ hóa thân thành một bác nông dân vui tính để chăm lo cho cánh đồng và chăn nuôi những con vật mà bạn yêu thích, bán chúng để lấy tiền mua những con vật quý hiếm hơn, mang lại lợi nhuận cao hơn.
            </li>
            <li>
              Trong game có 60 cấp độ cho người chơi, người chơi tham gia chơi khi đạt cấp độ càng cao thì càng nhận được nhiều phần thưởng và lợi nhuận lớn.
            </li>
            <li>
              Điểm mới trong game này là người chơi khi tham gia kiếm được đủ số tiền quy định sẽ được rút về tài khoản ngân hàng của mình. Bạn hãy chăm chỉ, kiên nhẫn chăm lo cho nông trại của mình để lên cấp càng cao và kiếm thật nhiều tiền. Bạn đã sẵn sàng tham gia chơi cùng chúng tôi chưa?
            </li>
          </ui>
        </div>

        @if (Route::has('register'))
        <center><a class="nav-link" href="{{ route('register') }}">
          <button class="btn btn-success shadow">Tham gia ngay</button>
        </a></center>
        @endif

      </div>
    </div>
  </div>
</div>
<div class="container-fluid body2 load-hidden">
  <div class="card bg-none mt-2 shadow">
    <div class="card-header">
      <center><h3>Lịch sử giao dịch</h3></center>
    </div>
    <div class="card-body">
      <!-- withdraw -->
      <center><h4>Rút Tiền</h4></center>
      <div class="table-responsive">
        <table class="table table-border table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Tên</th>
              <th>Mã giao dịch</th>
              <th>Số tiền</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tbody>
            @foreach($withdraw as $with)
            <tr>
              <th>{{ $with->user->name }}</th>
              <th>{{ $with->hash }}</th>
              <th>{{ $with->money }}</th>
              <th>{{ $with->created_at }}</th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Deposit -->
      <center><h4>Nạp Tiền</h4></center>
      <div class="table-responsive">
        <table class="table table-border table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Tên</th>
              <th>Ngân hàng</th>
              <th>Mã giao dịch</th>
              <th>Số tiền</th>
              <th>Thời gian</th>
            </tr>
          </thead>
          <tbody>
            @foreach($deposit as $de)
            <tr>
              <th>{{ strtoupper($de->user->name) }}</th>
              <th>{{ strtoupper($de->bank) }}</th>
              <th>{{ $de->hash }}</th>
              <th>{{ $de->money }}</th>
              <th>{{ $de->created_at }}</th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection