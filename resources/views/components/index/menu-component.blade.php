<ul class="list-group">

  <li class="list-group-item">
    <a href="{{ route('home') }}">
      <i class="fas fa-tractor mr-2"></i>Trang trại
    </a>
  </li>
  @auth
  <li class="list-group-item">
    <a href="/home/withdraw">
      <i class="fas fa-newspaper mr-2"></i>Rút Tiền
    </a>
  </li>
  @endauth
  <li class="list-group-item">
    <a href="{{ route('forum') }}">
      <i class="fas fa-comment-dots mr-2"></i>Forum
    </a>
  </li>
  <li class="list-group-item">
    <a href="{{ route('khuyenmai') }}">
      <i class="fas fa-gift mr-2"></i>Tin Tức
    </a>
  </li>
  <li class="list-group-item">
    <a href="{{ route('lienhe') }}">
      <i class="fas fa-headphones-alt mr-2"></i>Liên hệ
    </a>
  </li>
  @guest
  @else
  <li class="list-group-item">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </li>
  @endguest
</ul>