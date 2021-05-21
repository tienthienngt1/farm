<div class="headline load-hidden">
  <nav class="navbar navbar-expand-md navbar-light shadow">
    <div class="container-fluid">
      <button class="navbar-toggler " type="button" data-toggle="collapse" onclick="openNav()" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand mx-auto" href="{{ url('/') }}">
        <img src="{{ asset('images/title.png') }}" tittle="icon" width="220" height="100"/>
      </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"></ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <center>
                <div class="btn-group" role="group" >
                  @if (Route::has('login'))
                    <li>
                      <a class="nav-link" href="{{ route('login') }}"> <button type="button" class="btn btn-primary">
                        <i class="fas fa-user" style="margin-right:5px"></i>ĐĂNG NHẬP </button>
                      </a>
                    </li>
                    <li>
                      <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-success" >
                        <i class="fas fa-user-plus" style="margin-right:5px"></i></i>ĐĂNG KÍ</button>
                      </a>
                    </li>
                  @endif
                </div>
              </center>
                @else
                <div class=" row align-items-center mr-1">
                  <h5>Level: {{$user->level}} | Tài sản: {{json_decode($user->money)->balance}}TH
                  </h5>
                  </div>
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {!! Avatar::create(Auth::user()->name)->setFontSize(20)->setDimension(60)->toSvg() !!}
                  </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  @endguest
                </ul>
              </div>
          </div>
      </nav>
</div>
