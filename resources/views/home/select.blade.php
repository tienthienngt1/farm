@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <a class="mt_5" href="{{ route('home.farm') }}">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
</a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center>
          <h1>Túi</h1>
        </center>
      </div>
      <div class="card-body">
       @isset($amount)
           @foreach( $amount as $a )
           <div class="ml-auto">
             <form method="post" >
               @csrf
               <image src="{{ asset($a->icon) }}" width="20%" tittle="icon"/> <span>{{ $a->name }} </span>
               <input type="hidden" name="id" value="{{ $a->id }}" />
               <input type="submit" class="btn btn-link" name="submitSelect" value="Chọn" />
              </form>
           </div>
             <hr>
           @endforeach
        @endisset
      </div>
    </div>
</div>

@endsection