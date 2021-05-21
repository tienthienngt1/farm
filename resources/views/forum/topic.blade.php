@extends('layouts.app')

@section('content')
<div class="card body3 load-hidden">

  <a class="text-primary p-3" href="/forum/{{ request ()->route('id') }}"><i class="fas mr-2 fa-angle-double-left"></i>Quay về</a>

  <div class="card-header">
    <div class="card-body row">
      <div class="col-3 col-md-1">
        @guest
        @else
        {!! Avatar::create($data->name)->setFontSize(20)->setDimension(50)->toSvg() !!}
        @endguest
      </div>
      <div class="col-9 col-md-11">
        <dl>
          <h4>
            @if ( $data->email ==='admin@farmcoin.xyz' )
            <span style="color:red">{{$data->name}}</span>
            <span class="badge badge-danger">Lv {{ $data -> level }}</span>of
            @elseif ( $data->email ==='Phamvannam2001@gmail.com' )
            <span style="color:green">{{$data->name}}</span>
            <span class="badge badge-danger">Lv {{ $data -> level }}</span>of
            @else
            <span>{{$data->name}}</span>
            <span class="badge badge-light">Lv {{ $data -> level }}</span>
            @endif
          </h4>
          <dd>
            {{ $data->tittle }} >>>
          </dd>
          <dd>
            {{ $data->content }}
          </dd>
        </dl>
        <dl>
          <small>{{ \carbon\carbon::parse($data->created_at)->diffForHumans() }}</small>
        </dl>

        @if($check_like !== null)
        <form method="post" action="">
          @csrf
          <i class="fas fa-thumbs-up text-primary"></i>
          <input type="submit" name="dislike" class="btn btn-link" value="Bỏ thích" />&nbsp<span class="text-primary">{{ $data->like }}</span>
        </form>
        @else
        <form method="post" action="">
          @csrf
          <i class="fas fa-thumbs-up"></i>
          <input type="submit" name="like" class="btn btn-link text-success" value="Thích" />&nbsp{{ $data->like }}
        </form>
        @endif

      </div>
    </div>
    <form method="POST" action="">
      @csrf
      <div class="form-group row">
        <label for="content" class="col-md-4 col-form-label text-md-right">{{ __(' Nội dung') }}</label>
        <div class="col-md-6">
          <textarea class="@error('content') is-invalid @enderror" autofocus id="content" name="content" rows="4" style="min-width: 100%"></textarea>
          @error('content')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button id="reg" type="submit" class="btn btn-primary" onclick="snipper()">
            Trả lời
          </button>
        </div>
      </div>
    </form>
  </div>
  @isset($comment)
  @foreach($comment as $c)
  <div class="card-body" style="padding:0px 5px">
    <div class="card-body row">
      <div class="col-3 col-md-1">
        @guest
        @else
        {!! Avatar::create($c->name)->setFontSize(20)->setDimension(50)->toSvg() !!}
        @endguest
      </div>
      <div class="col-9 col-md-11">
        <dl>
          <h4>
            @if($c->email === 'admin@farmcoin.xyz')
            <span style="color:red">{{ $c->name }}</span>
            <span class="badge badge-danger">Lv {{$c->level}}</span>
            @elseif( $c->email ==='Phamvannam2001@gmail.com')
            <span style="color:green">{{ $c->name }}</span>
            <span class="badge badge-danger">Lv {{$c->level}}</span>
            @else
            <span>{{ $c->name }}</span>
            <span class="badge badge-light">Lv {{$c->level}}</span>
            @endif
          </h4>
          <dd class="font-italic">
            {{ $c->content }}
          </dd>
        </dl>
        <small>{{ \carbon\carbon::parse($c->created_at)->diffForHumans() }}</small>
      </div>
    </div>
    @if((int)json_decode(Auth::user()->role)->auth === 3 or Auth::user()->email === 'admin@farmcoin.xyz')
    <!-- Button trigger modal -->
    <button type="button" style="border-radius: 30px; border:none; float:right" data-toggle="modal" data-target="#modal{{ strtotime($c->created_at) }}">delete
    </button>
  </td>
  <!-- Modal -->
  <div class="modal fade" id="modal{{ strtotime($c->created_at) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center> Are you want to continue? </center>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="post">
            @csrf
            <input type="hidden" name="_id" value="{{$c->id}}" />
            <input type="hidden" name="_id_cat" value="{{$c->id_category}}" />
            <input type="submit" name="delete" class="btn btn-primary" value="Delete"></input>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
</br>
</div>

@endforeach
@endisset
</div>



<button id="myP" class="btn btn-primary" type="button" disabled hidden>
<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
Đang đăng...
</button>

@endsection