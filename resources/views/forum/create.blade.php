@extends('layouts.app')

@section('content')


<div class="body3 load-hidden">

  <a class="text-primary" href="{{ route('forum') }}">Forum</a>

  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow">
          <a class="text-primary p-3" href="/forum"><i class="fas mr-2 fa-angle-double-left"></i>
            Quay về
          </a>

          <div class="card-body">
            <form id="form" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="tittle" class="col-md-4 col-form-label text-md-right">{{ __(' Tiêu đề ') }}</label>

                <div class="col-md-6">
                  <input id="tittle" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" value="{{ old('tittle') }}" autofocus>
                  @error('tittle')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

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

              <div class="form-group row mb-0 mt-2">
                <div class="col-md-8 offset-md-4">
                  <button id="reg" type="submit" class="btn btn-primary" onclick="snipper()">
                    Tạo
                  </button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<button id="myP" class="btn btn-primary" type="button" disabled hidden>
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Đang tạo...
</button>
<script>
  Dropzone.options.myDropzone = {
    url: "",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    acceptedFiles: "image/*",
    init: function() {
      var myDropzone = this;

      // Here's the change from enyo's tutorial...

      $("#submit-all").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });
    };
  </script>
  @endsection