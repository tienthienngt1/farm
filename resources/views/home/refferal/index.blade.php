@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <a class="mt_5" href="{{ route('home') }}">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
  </a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center>
          <h3>Hệ thống Giới thiệu</h3>  
        </center>
      </div>
      <div class="card-body">
      
        <div class="row">
          <div class="col-8">
            <p>Mã giới thiệu: {{ $ref->refferal }}</p>
          </div>
          <div class="col-4">
            <span class="float-right" style="font-size:15px">
              
              <button type="button" class="btn btn-link text-dark" data-toggle="modal" data-target="#instruction">
                <i class="fas fa-info-circle"></i> Hướng dẫn
              </button>
              <x-home.refferal.instruction-component/>
            </span>
          </div>
        </div>
        @if((int)$ref->ref_status !== 0)
          <center style="font-size: 27px; color: #644646">
          {{$ref->money}}TH / 350TH<br>
          @if((int)$ref->ref_status === 1)
          <form method="post">
            @csrf
            @if((int)$ref->money >= 350)
            <input type="submit" class="btn btn-success" name="reward" value="Nhận Thưởng" />
            @else
            <input type="button" class="btn btn-success" style="opacity: 0.4" name="reward" value="Chưa Đạt" />
            @endif
          </form>
          @else
            <input type="button" class="btn btn-success" style="opacity: 0.4" name="reward" value="Đã Nhận" />
          @endif
        </center>
        
        <div class="table-responsive mt-3">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Tên</th>
                <th scope="col">Level</th>
                <th scope="col">Tiền thưởng</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Thời gian</th>
              </tr>
            </thead>
              @if($refbuy !== null)
              @foreach($refbuy as $ref)
              @if($ref->name == 1)
            <tbody>
              <tr>
                <th scope="row">{{ $ref->user->name }}</th>
                <td>{{ $ref->user->level }}</td>
                <td><span class="text-success" >{{ $ref->money }} TH</span> </td>
                <td>Đăng kí</td>
                <td>{{ $ref->created_at }}</td>
              </tr>
            </tbody>
              @endif
              @endforeach
              @else
              <center>
                <div style='opacity:0.5'>Trống</div>
              </center>
              @endif
          </table>
        </div>
        <div class="d-flex justify-content-center">
           {{ $refbuy->links() }}
        </div>
        
        @else
        <center class="form-group">
          <form method="post">
            @csrf
            <input class="form-control" type="number" placeholder="Vui lòng nhập mã giới thiệu" name="ref" required />
            <input type="submit" class="btn btn-success" name="submitRef" value="Nhập Mã" />
          </form>
        </center>
        @endif
      </div>
    </div>
</div>

@endsection