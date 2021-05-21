@extends('layouts.app')

@section('content')

<div class="container-fluid load-hidden body2">
  <div class="card bg-none mt-5">
    <div class="card-header">
      <h1>Tin Tức</h1>
    </div>
    <div class="card-body">


      @foreach ($new as $ne)
      @if(isset($_GET['new']) && $_GET['new'] == $ne->id)
      @if($ne->id == $_GET['new'])
      <a href="/khuyenmai" class="btn btn-link">Tin Tức</a>
      <h3>
        {{ $ne -> tittle }}
      </h3>
      <br>
      <p>
        {!! $ne -> content !!}
      </p>
      @endif
      @else

      @if(sizeof($new) == 0)
      <center><span style="opacity:0.5">Trống</span></center>
      @else
      <a href="/khuyenmai?new={{$ne->id}}" class="btn btn-link">{{ $ne->tittle }}</a>
      @endif

      @endif
      @endforeach
      @endsection
    </div>
  </div>
</div>