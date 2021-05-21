@extends('layouts.app')
@section('content')
@php
$levelPet = json_decode($user->role)->levelPet;
@endphp
<div class="body2 load-hidden">
  <div style="height:100px">
    <a href="/home/pet">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
    </a>
  </div>
  <!--========≠==≠=1=≠====≠≠=-->
<div class="card">
  <div class="card-header">
    <center><h2>VẬT NUÔI</h2></center>  
  </div>
  <div class="card-body">
    @foreach($pet as $pet)
    @if($levelPet >= $pet->id)
    <div class="row">
      <div class="col-3">
        <image src="{{ asset($pet->path) }}" title="{{$pet->name}}" width="60%"/>
        <span> 
        <span><h3>{{$pet->name}}</h3></span>
      </div>
      <div class="col-6">
        <div class="mt-4">Thời gian : {{$pet->time}}h</div>
        <div>Lời : {{$pet->sell/1000}}TH</div>
        <div>Exp : {{$pet->exp}}</div>
      </div>
      <div class="col-3 row align-items-center" style="color:#5f2c16">
        <form class="a" method="post" />
          @csrf
          <input type="hidden" name="__id" value="{{$pet->id}}" />
          <input type="hidden" name="__name" value="{{$pet->name}}" />
          <input class="btn btn-primary" type="submit" name="buy" value="Nuôi" />
        </form>   
      </div>
    </div>
    <hr>
    @endif
    @endforeach
  </div>
  </div>
</div>

@endsection