<!-- display sm up -->
<div class="row body2 load-hidden">
  <div class="col-3">
    <a class="btn btn-link" href="/home/bag">
      <image src="{{ asset('images/bag.png') }}" tittle="bag" width="100%" /><br>
      Túi
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="{{ route('home.farm') }}">
      <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="250%" /><br>
      Cánh Đồng
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="home/pet">
      <image class="mx-auto" src="{{ asset('images/pig.png') }}" tittle="bag" width="100%" /><br>
      Vật Nuôi
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="home/shop">
      <image src="{{ asset('images/shop.png') }}" tittle="bag" width="100%" /><br>
      Cửa Hàng
    </a>
  </div>
</div>

<div class="row body3 load-hidden">
  <div class="col-3">
    <a class="btn btn-link" href="/home/refferal">
      <image src="{{ asset('images/refferal.png') }}" tittle="bag" width="100%" /><br>
      Giới Thiệu
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="/home/deposit">
      <image src="{{ asset('images/dolar.png') }}" tittle="bag" width="100%" /><br>
      Nạp Tiền
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="/home/info">
      <image src="{{ asset('images/user.png') }}" tittle="bag" width="100%" /><br>
      Thông Tin Cá Nhân
    </a>
  </div>
  <div class="col-3">
    <a class="btn btn-link" href="home/rank">
      <image src="{{ asset('images/rank.png') }}" tittle="bag" width="100%" /><br>
      Xếp Hạng
    </a>
  </div>
</div>

<div class="row body3 load-hidden">

  <div class="col-3">
    <a class="btn btn-link" href="home/partner">
      <image src="https://cdn.pixabay.com/photo/2013/07/12/14/44/handshake-148695_1280.png" tittle="bag"
        width="100%" /><br>
      Đối tác
    </a>
  </div>


  <div class="col-3">
    <a class="btn btn-link" href="home/setting">
      <image src="{{ asset('images/setting.png') }}" tittle="bag" width="100%" /><br>
      Cài Đặt
    </a>
  </div>
  @if((int)json_decode($user->role)->auth === 0)
  <div class="col-3">
    <a class="btn btn-link" href="home/launchpad?action=wallet">
      <image src="{{ asset('images/launchpad.png') }}" tittle="bag" width="60%" /><br>
      Launchpad THcoin
    </a>
  </div>
  @endif
</div>