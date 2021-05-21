@extends('layouts.app')

@section('content')
<div class="body2 load-hidden">
     <a class="text-primary" href="{{ route('forum') }}">Forum</a>&nbsp/&nbsp<a class="text-primary" href="/forum/1">Hỏi đáp</a>
    <div class="card bg-none mt-5 shadow">
      @isset($id)
      @else
         <a class="text-primary p-3" href="{{ route('forum') }}"><i class="fas mr-2 fa-angle-double-left"></i>Quay về</a>
      <div class="card-header">
          <h1> HỎI ĐÁP </h1>
      </div>
      <div class="card-body" style="padding:0px 5px;">
        @guest
        @else
          <a class="btn btn-success float-right mx-3 mt-3" href="/forum/1/create">
            Tạo bài viết
          </a>
        <div class="clearfix"></div>
        @endguest
        <hr />
        @isset($data)
          @foreach($data as $data1)
          <a href="/forum/{{ $data1->category }}{{ $data1->hash }}" class="text-primary" >{{ $data1->tittle }}</a>
          <br>
        bởi: {{ $data1->name }} &nbsp|&nbsp<i class="fas fa-eye"></i> &nbsp{{ $data1->view }}&nbsp|&nbsp<i class="fas fa-comment"></i> &nbsp{{ $data1->comment }}&nbsp|&nbsp<i class="fas fa-thumbs-up"></i>&nbsp{{ $data1->like }}
        <br>
          <small>{{ \carbon\carbon::parse($data1->created_at)->diffForHumans() }}</small>
            <hr />
          @endforeach
        @endisset
      </div>
      @endisset
    </div>
    <div class="d-flex justify-content-center">
       {!! $data->links() !!}
    </div>
  </div>
@endsection
      