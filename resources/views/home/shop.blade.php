@extends('layouts.app')

@section('content') 
@php 
$handle = json_decode($user->role);
@endphp
<div class="body2 load-hidden">
  <div style="height:100px">
    <a href="{{ route('home') }}">
        <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
    </a>
  </div>
  <image src="{{ asset('images/market.png') }}" tittle="" width="100%"/>
  <div class="row mb-5 mt-3 justify-content-center">
    <a href ="1" class="btn @if($id == 1) active @endif btn-outline-primary">Nông trại</a>
    <a href ="2" class="btn @if($id == 2) active @endif btn-outline-primary">Thú cưng</a>
  </div>
  <!--========≠==≠=1=≠====≠≠=-->
  
  @if($id==1)
  @foreach($getVet as $pet)
  <div class="row">
    <div class="col-3">
     <center> 
       <image src="{{asset($pet->icon)}}" title="{{$pet->name}}" width="60%"/><br>
       <span class="font-weight-bold"> {{$pet->name}} </span>
     </center>
    </div>
    <div class="col-6" style="color:#5f2c16">
      <p>Giá mua: <span style="color:#6c2304">{{$pet->cost}}TH</span></p>
      <p>Thời gian: {{$pet->time}}h</p>
      <p>Lời: {{$pet->sell/1000}}TH</p>
      <p>Exp: {{$pet->exp}}</p>
    </div>
    <div class="col-3">
      @if((int)$handle->levelFarm >= (int)$pet->id)
      <button class="btn btn-success" style="opacity:0.3">Đã Sở Hữu</button>
      @elseif($handle->levelFarm + 1 == $pet->id)
      
      <button class="btn btn-primary"data-toggle = "modal" data-target="#unlock">Mở</button>
      <div class="modal fade" id="unlock" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="unlocktittle">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              Bạn có muốn mở khoá {{ $pet->name }} với giá {{ $pet->cost }}TH không?
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal">Hủy</button>
              <form class="a" method="post" action="{{ route('shop.store') }}" />
                @csrf
                <input class="btn btn-primary" type="submit" name="buy" value="Xác Nhận" />
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="name" value="{{$pet->name}}" />
              </form>
            </div>
          </div>
        </div>
      </div>
      @else
      <button class="btn btn-primary" style="opacity:0.3">Chưa Mở</button>
      @endif
    </div>
  </div>
  <hr>
  @endforeach
  @endif
  <!--========≠==≠=1=≠====≠≠=-->
  
  @if($id==2)
  @foreach($pet as $pet)
  <div class="row">
    <div class="col-3">
      <center>
      <image src="{{asset($pet->path)}}" title="chicken" width="60%"/><br>
        <span class="font-weight-bold"> {{$pet->name}} </span>
      </center>
    </div>
    <div class="col-6" style="color:#5f2c16">
      <p>Giá mua: <span style="color:#6c2304">{{$pet->cost}}TH</span></p>
      <p>Thời gian: {{$pet->time}}h</p>
      <p>Lời: {{$pet->sell/1000}}TH</p>
      <p>Exp: {{$pet->exp}}</p>
    </div>
    <div class="col-3">
      @if((int)$handle->levelPet >= (int)$pet->id)
      <button class="btn btn-success" style="opacity:0.3">Đã Sở Hữu</button>
      @elseif($handle->levelPet +1 == $pet->id)
      <button class="btn btn-primary" data-toggle = "modal" data-target="#unlock1">Mở</button>
      <div class="modal fade" id="unlock1" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="unlock1tittle">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              Bạn có muốn mở khoá {{ $pet->name }} với giá {{ $pet->cost }}TH không?
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal">Hủy</button>
              
              <form method="post" action="{{ route('shop.store') }}">
                @csrf
                <input type="hidden" name="id" value="{{$id}}" />
                <input type="hidden" name="name" value="{{$pet->name}}" />
                <input id="a" class="btn btn-primary" type="submit" name="buy" value="Mở khoá" />
              </form>
              
            </div>
          </div>
        </div>
      </div>
      @else
      <button class="btn btn-primary" style="opacity:0.3">Chưa Mở</button>
      @endif
    </div>
  </div>
  <hr>
  @endforeach
  @endif
  </div>
  
  <!--========≠==≠=2=≠====≠≠=-->
  
  <script>
   $(document).ready(function() {
    $(".a").click(function () {
        $(".a").removeClass("active");
        $(this).addClass("active");     
    });
   });
  </script>
  
@endsection