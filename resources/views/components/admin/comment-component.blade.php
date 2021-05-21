<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#new">New</button>
<div id="new" class="collapse mt-3">

  <!-- FORM -->
  <form id="form" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
      <label for="tittle" class="col-md-4 col-form-label text-md-right">{{ __(' Tiêu đề ') }}</label>

      <div class="col-md-6">
        <input id="tittle" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" value="{{ old('tittle') }}" autofocus>
      </div>
    </div>

    <div class="form-group row">
      <label for="content" class="col-md-4 col-form-label text-md-right">{{ __(' Nội dung') }}</label>

      <div class="col-md-6">
        <textarea class="@error('content') is-invalid @enderror" autofocus id="content" name="content" rows="4" style="min-width: 100%"></textarea>
      </div>
      <input type="submit" name="new" />
    </div>
  </form>


  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>title</th>
          <th>content</th>
          <th>status</th>
          <th>option</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($news as $ne)
        <tr>
          <td>{{ $ne->id }}</td>
          <td>{{ $ne->tittle }}</td>
          <td>{{ $ne->content }}</td>
          <td>
            @if($ne->status == 0)
            <span class="text-danger">OFF</span>
            @else
            <span class="text-success">ON</span>
            @endif
          </td>
          <td>
            <form method="post">
              @csrf
              <input type="hidden" name="_id" value='{{$ne->id}}' />
              <input type="hidden" name="_status" value='{{$ne->status}}' />
              <input type="submit" name="turnOn" value="Change" />
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>