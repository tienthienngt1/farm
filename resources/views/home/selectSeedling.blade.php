@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
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
       @isset($vet)
         @foreach($vet as $vet)
           <div class="ml-auto">
             <form method="post" >
               @csrf
               <image src="{{ asset($vet->icon) }}" width="20%" tittle="icon"/> <span>{{ $vet->name }} </span>
               <input type="hidden" name="id" value="{{ $vet->id }}" />
               <input type="submit" class="btn btn-link" name="selectSeedling" value="Chọn" />
              </form>
           </div>
             <hr>
          @endforeach
        @endisset
      </div>
    </div>
</div>

@endsection