@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <a class="mt_5" href="{{ route('home') }}">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
  </a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center>
          <h1>Túi</h1>  
        </center>
      </div>
      <div class="card-body">
         @php 
         $flag = false;
         @endphp
        @foreach($bag as $key => $value)
          @php
            $handle = json_decode($value);
          @endphp
          @isset($handle -> path)
          @php
         $flag = true;
          @endphp
            <div>
              <form method="post" action = "/home/bag/{{$key}}">
                @csrf
                <image src="{{ asset($handle -> path) }}" width="20%" title="" /> <span class="ml-3">
                 {{ $handle -> name }}  </span>
                <div class="float-right">
                  <input class="btn btn-primary" type="submit" name="sell" value="Bán" /><br>
                  {{ (($handle -> cost) * ($handle->quantity))/1000 }} TH
                </div>
                <p>Số lượng: {{ $handle->quantity }}</p>
              </form>
            </div>
            <hr>
          @endisset
        @endforeach
        @if($flag === false)
        <div class="justify-content-center row" style="opacity:0.4">
          Không có vật phẩm
        </div>
        @endif
      </div>
    </div>
</div>

@endsection