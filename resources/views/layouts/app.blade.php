<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#f2bfbf">
  <meta name="msapplication-TileColor" content="#f2bfbf">
  <meta name="msapplication-navbutton-color" content="#f2bfbf">
  <meta name="apple-mobile-web-app-status-bar-style" content="#f2bfbf">
  <!-- security -->
  <meta name="cystack-verification" content="084143ba130fd06642608217a98f296e" />

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
  <link rel="icon" type="image/png" href="{{ asset('images/tittle.png') }}" sizes="192x192" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/tittle.png') }}" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Farmcoin</title>

  <!-- Scroll -->
  <script type="text/javascript" src="{{ asset('js/scroll.js') }}"></script>

  <!-- Scripts -->
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('js/all.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('js/jquery.pjax.js') }}" defer></script>

  <!-- Css -->
  <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('css/awesome.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('css/index.css') }}" rel="stylesheet">

  <!--  toastify -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>
  <div class="container" style="max-width:700px">
    <marquee width="100%" behavior="scroll" bgcolor="pink">
      @foreach($new as $news)
      @if($news->status == 1)
      <div class="headline load-hidden">
        <span class="text-danger">Tin Tức:</span>
        {{$news->tittle}}
        <a href="/khuyenmai?new={{$news->id}}" class="text-primary">Xem thêm...</a>
      </div>
      @else
      @endif
      @endforeach
    </marquee>
    <div class="headline load-hidden">
      <x-index.navbar-component :user="$user" />
      <a href="/home">farm</a>
      <a href="/khuyenmai">km</a>
      <a href="/forum">forum</a>
      <a href="/contact">lienhe</a>
    </div>
    <div id="mySidenav" class="sidenav body1 load-hidden">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <!-- open nav -->
      <x-index.header-component :user="$user" />
      <x-index.menu-component />
      <!-- close nav -->
    </div>
    <x-index.header-button-component />
    <div>
      <main class="py-4" id="content">
        @yield('content')
      </main>
    </div>
    <div style=" height: 10px">
    </div>
    <div class="row justify-content-center bottom load-hidden">
      Bản quyền thuộc farmcoin 2021©
    </div>
  </div>
  <script>

    $(document).ready(function() {
      $(document).pjax('a', '#content')
    });

  </script>
  <script>

    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("mySidenav").style.borderRight = "2px solid #721a1a";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.borderRight = "none";
      document.getElementById("mySidenav").style.width = "0";
    }

    function snipper() {
      var x = document.getElementById("myP").innerHTML;
      document.getElementById("reg").innerHTML = x;
    }

    $(document).ready(function() {
      $(document).pjax('a', '#content')
    });

  </script>

  <script>

    @if (Session::has('notify'))
      Toastify({
      text: '{{
      Session::get('notify')
    }}',
    duration: 8000,
    newWindow: true,
    close: true,
    gravity: "top",
    positionRight: true,
    backgroundColor: "#29b24b",
    stopOnFocus: true,
    onClick: function() {}
  }).showToast();
@endif
@if (Session::has('notifyError'))
  Toastify({
  text: " {{ Session::get('notifyError') }}",
  duration: 10000,
  newWindow: true,
  close: true,
  gravity: "top",
  positionRight: true,
  backgroundColor: "#c76561",
  stopOnFocus: false,
  onClick: function() {}
}).showToast();
@endif
</script>
<script>
ScrollReveal().reveal('.headline', {
duration: 2000
});
ScrollReveal().reveal('.body1', {
duration: 3000
});
ScrollReveal().reveal('.body2', {
duration: 3500
});
ScrollReveal().reveal('.body3', {
duration: 4000
});
ScrollReveal().reveal('.bottom', {
duration: 5000
});
ScrollReveal().reveal('.widget', {
interval: 200
});
</script>

</body>
</html>