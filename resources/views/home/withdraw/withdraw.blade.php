@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center><h3>RÚT TIỀN</h3></center>
      </div>
      <div class="card-body">
          <div>
            Số dư : 1220TH
          </div>
          <div class="form-group">
            <label for="ControlSelect1">Chọn tài khoản</label>
            <select class="form-control" id="ControlSelect1">
              <option>1</option>
            </select>
          </div>
      </div>
    </div>
</div>

@endsection