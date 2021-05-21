@extends('layouts.app')

@section('content')
     <a class="text-primary" href="{{ route('forum') }}">Forum</a>&nbsp/&nbsp<a class="text-primary" href="/forum/4">Kết bạn</a>
    <div class="card bg-none mt-5 shadow">
      @isset($id)
         <a class="text-primary p-3" href="{{ route('forum.hoidap') }}"><i class="fas mr-2 fa-angle-double-left"></i>Quay về</a>
        <x-forum.comment-component />
      @else
         <a class="text-primary p-3" href="{{ route('forum') }}"><i class="fas mr-2 fa-angle-double-left"></i>Quay về</a>
      <div class="card-header">
          <h1> KẾT BẠN </h1>
      </div>
      <div class="card-body" style="padding:0px 5px;">
        @guest
        @else
          <a class="btn btn-success float-right mx-3 mt-3" href="/forum/4/create">
            Tạo bài viết
          </a>
        <div class="clearfix"></div>
        @endguest
        <hr />
           @isset($data)
          @foreach($data as $da)
          <a class="text-primary" href="/forum/{{ $da->category }}{{ $da->hash }}">
            {{ $da->tittle }}
          </a>
          <br>
        bởi: {{ $da->name }} &nbsp|&nbsp<i class="fas fa-eye"></i> &nbsp{{ $da->view }}&nbsp|&nbsp<i class="fas fa-comment"></i> &nbsp{{ $da->comment }}&nbsp|&nbsp<i class="fas fa-thumbs-up"></i>&nbsp{{ $da->like }} 
        <br>
          <small>{{ \carbon\carbon::parse($da->created_at)->diffForHumans() }}</small>
          
      <hr />
          @endforeach
        @endisset
      </div>
      @endisset
    </div>
  <div class="d-flex justify-content-center">
       {!! $data->links() !!}
    </div>
@endsection