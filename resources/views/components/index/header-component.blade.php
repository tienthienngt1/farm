<div>
  @guest
  <div class="btn-group justify-content-center" role="group">
    @if (Route::has('login'))
    <a class="nav-link" href="{{ route('login') }}">
      <button class="btn btn-primary">Đăng nhập</button>
    </a>
    @endif
    @if (Route::has('register'))
    <a class="nav-link" href="{{ route('register') }}">
      <button class="btn btn-success">Đăng kí</button>
    </a>
    @endif
  </div>
  @else
  <center>
    <div class="row align-items-center">
      <div class="col-6">
        {!! Avatar::create(Auth::user()->name)->setDimension(100)->setFontSize(30)->toSvg() !!}
      </div>
      <div class="col-6">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"style="font-size:50px"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </div>
  </center>
  <div class="row">
    <div class="col-4">
      <h5>Level:{{$user->level}}</h5>
    </div>
    <div class="col-8">
      <h5>Tài sản:{{ round(json_decode($user->money)->balance,2) }}TH</h5>
    </div>
  </div>
  @if (json_decode($user->role)->auth === 0)
  <a href="/handleAdmin">Admin</a>
  @endif
  @endguest
</div>