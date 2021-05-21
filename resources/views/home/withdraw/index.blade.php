@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <a class="mt_5" href="{{ route('home') }}">
    <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
  </a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center><h3>RÚT TIỀN</h3></center>
      </div>
      <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                <form method="post" >
                  @csrf
                  
                  <div class="form-group">
                    <select class="form-control" required>
                      @isset($user->info)
                      <option name="bank" value="0">{{$user->info->bankname}}</option>
                      @endisset
                    </select>
                  </div>
                  <div class="mt-2 mb-2">
                    Số dư : <span style="font-size:25px">{{json_decode($user->money)->balance}}</span>TH
                    <p style="color:red"> 1 TH = 1000₫ </p>
                  </div>
                  <input type="number" class="form-control @error('bankname') is-invalid @enderror" name="money" placeholder="Nhập số tiền" required >
                    @isset($money)
                      <div class="alert alert-warning" role="alert">
                          <strong>{{ $money }}</strong>
                      </div>
                    @endisset
                  <input type="submit" class="btn btn-primary mt-2" value="Rút" />
                </form>
              </div>
            </div>
            
      </div>
      
    </div>
</div>

@endsection