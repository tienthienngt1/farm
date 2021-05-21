@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <a class="mt_5" href="{{ route('home') }}">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
  </a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center>
          <h1>Xếp Hạng</h1>  
        </center>
      </div>
      <a class="btn btn-link" href="/home/rank/1"> Xếp hạng cấp độ</a>
      <a class="btn btn-link" href="/home/rank/2"> Xếp hạng cánh đồng</a>
      <a class="btn btn-link" href="/home/rank/3"> Xếp hạng thú cưng</a>
      <div class="card-body">
        @php $stt=0; @endphp
        @if($id==='1')
          <div class="table-responsive mt-3">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Hạng</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Cấp độ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($level as $lv)
                  @php $stt++; @endphp
                  <tr>
                    <td>
                      @if($stt == 1)
                      <span style="font-size:45px; color:red">1</span>
                      @elseif($stt == 2)
                      <span style="font-size:38px; color:orange">2</span>
                      @elseif($stt == 3)
                      <span style="font-size:28px; color:yellow">3</span>
                      @else
                      {{ $stt }}
                      @endif
                    </td>
                    <td>{{ strtoupper ($lv -> name) }} </td>
                    <td>{{ $lv -> level }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        @elseif($id==='2')
          <div class="table-responsive mt-3">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Hạng</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Cấp độ cánh đồng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($vet as $ve)
                  @php $stt++; @endphp
                  <tr>
                    <td>
                      @if($stt == 1)
                      <span style="font-size:45px; color:red">1</span>
                      @elseif($stt == 2)
                      <span style="font-size:38px; color:orange">2</span>
                      @elseif($stt == 3)
                      <span style="font-size:28px; color:yellow">3</span>
                      @else
                      {{ $stt }}
                      @endif
                    </td>
                    <td>{{ strtoupper ($ve->name) }} </td>
                    <td>{{  json_decode($ve->role)->levelFarm  }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        @elseif($id==='3')
          <div class="table-responsive mt-3">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Xếp hạng</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Cấp độ thú cưng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pet as $pe)
                  @php $stt++; @endphp
                  <tr>
                    <td>
                      @if($stt == 1)
                      <span style="font-size:45px; color:red">1</span>
                      @elseif($stt == 2)
                      <span style="font-size:38px; color:orange">2</span>
                      @elseif($stt == 3)
                      <span style="font-size:28px; color:yellow">3</span>
                      @else
                      {{ $stt }}
                      @endif
                    </td>
                    <td>{{ strtoupper ($pe->name) }} </td>
                    <td>{{ json_decode($pe -> role)->levelPet }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
      </div>
    </div>
</div>

@endsection