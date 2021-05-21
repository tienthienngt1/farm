@extends('layouts.app')

@section('content')
@php 
$time=strtotime($getPetBag->timePet);
$path='';$name=''; $sell='';$exp='';
@endphp

@foreach($pet as $pet)
@if((int)$pet->id === (int)$getPetBag->statusPet)
@php
  $name = $pet->name;
  $sell = $pet->sell;
  $exp = $pet->exp;
  $path = $pet->animation;
@endphp

@endif
@endforeach
<div class="body2 load-hidden">
  <div class="row">
    <div class="col-8">
      <a href="{{ route('home') }}">
            <image src="{{ asset('images/exit.png') }}" tittle="exit" width="30%"/>
      </a>
    </div>
    <div class="col-4">
      <a href="pet/warehouse">
            <image src="{{ asset('images/close.png') }}" tittle="kho" width="80%"/>
      </a>
    </div>
  </div>
  <!--========≠==≠=1=≠====≠≠=-->
  
  <div class="row backgroundPet" >
    <image src="{{asset('images/backgroundPet.png')}}" title="background" width="100%"/><br>
     <center>
       @if($getPetBag -> statusPet !== null)
       <div class="pet col-4" >
         <image src="{{asset($path)}}"  width="50%"/><br>
         <span id="sell" style="color:yellow">{{$sell/1000}} TH</span><br>
         <span id ="clock"></span>
       </div>
       @else
       <span class="pet" style="opacity:0.5; top:70%; left:30%">Bạn chưa nuôi con vật nào</span>
       @endif
     </center>
  </div>
 
  <div class="d-flex justify-content-beetwen mt-5">
   <image src="{{asset('images/fence.png')}}" title="fence" width="50%"/>
   <image src="{{asset('images/fence.png')}}" title="fence" width="50%"/>
  </div>
</div>

<script>
//=====================================
var time1 = {{$time}};
var x1 = setInterval(function() {
  var a1 = new Date().getTime() ;
  var now1 = Math.floor(a1 / 1000);
  var sum1 = time1 - now1 ;
  var days1 = Math.floor(sum1 / (60 * 24 * 60));
  var hours1 = Math.floor((sum1 % (60 * 24 * 60)) / ( 60 * 60 ));
  var minutes1 = Math.floor(((sum1 % (60 * 24 * 60)) % ( 60 * 60 )) / 60);
  var seconds1 = Math.floor(((sum1 % (60 * 24 * 60)) % ( 60 * 60 )) % 60);
  document.getElementById("clock").innerHTML = days1 + "d" + hours1 + "h" + minutes1 + "m" + seconds1 + "s";
  if (sum1 < 0) {
    clearInterval(x1);
    document.getElementById("clock").innerHTML = `
       <form method="post">
        @csrf
        <input type="hidden" name="__id" value ="{{ $getPetBag->statusPet }}" />
        <input type="submit" class="btn btn-primary" value="Bán" name="sellPet"/>
      </form>
    `;
  }
}, 1000);
</script>

@endsection