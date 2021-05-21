@extends('layouts.app')

@section('content')

<div class="body2 load-hidden">
  <div class="card bg-none shadow">
    <div class="card-header">
      <center>
        <h2>
          ĐỐI TÁC
        </h2>
      </center>
    </div>

    <div class="card-body">
      <center>
        <a href="/home/partner" class="btn
          @if(isset($_GET['action']))
          @if($_GET['action'] == 'wallet' or $_GET['action'] == 'list')
          btn-outline-primary
          @else
          btn-primary
          @endif
          @else
          btn-primary
          @endif
          m-1">Mua Vip</a>
        <a href="?action=wallet" class="btn
          @if(isset($_GET['action']) and $_GET['action']=='wallet')
          btn-primary
          @else
          btn-outline-primary
          @endif

          m-1">Ví Đối Tác</a>
        <a href="?action=list" class="btn
          @if(isset($_GET['action']) and $_GET['action']=='list')
          btn-primary
          @else
          btn-outline-primary
          @endif
          m-1">Danh sách Đối Tác</a>
      </center>
      @php
      $get = null;
      if(isset($_GET['action'])){
      $get = $_GET['action'];
      }
      @endphp
      @if($get === 'wallet')
      <x-home.partner.Wallet :wallet='$user' />
      @elseif($get === 'list')
      <x-home.partner.ListPartner :listpartner='$partner' />
      @else
      <!-- REQUIRED -->
      <span class="text-danger"><h5>* YÊU CẦU: </h5></span>
      <ul>
        <li>Đạt cấp độ 25 trở lên</li>
        <li>Giới hạn 10 người đối tác cho lần ra mắt này</li>
      </ul>

      <!-- VIP -->
      <div class="row justify-content-center">

        <div class="col-sm-5 card m-2 shadow">
          <div class="card-header">
            <center><h3>VIP 1</h3></center>
          </div>
          <div class="card-body">
            <span class="text-danger"><h5>* Đặc quyền: </h5></span>
            <ul>
              <li>Được trở thành đối tác uy tín của Farmcoin.</li>
              <li>Được hưởng hoa hồng của gói đối tác lên đến 25%/tuần.</li>
              <li>Được ưu đãi giảm 25% khi mua token THcoin trong đợt bán khởi đầu của dự án THcoin trên nền tảng blockchain.</li>
              <li>Được hưởng hoa hồng 10% khi người giới thiệu mua token THcoin khi mở dipo.</li>
              <center class="mt-5">
                Giá Ưu Đãi:<h4> 2000TH </h4>
              </center>
            </ul>
            <center>
              @if($user->partner !== null && (int) $user->partner->vip === 1)
              <button class="btn btn-outline-primary" style="opacity:0.5">ĐÃ MUA</button>
              @elseif($user->partner !== null && (int) $user->partner->vip === 2)
              <button class="btn btn-outline-primary" style="opacity:0.5">KHOÁ</button>
              @else
              <button class="btn btn-outline-primary"data-toggle="modal" data-target="#vip1">MUA</button>

              <div class="modal fade" id="vip1" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="unlocktittle">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      Bạn có muốn mua gói Vip1 không?
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" data-dismiss="modal">Hủy</button>
                      <form method="post" />
                      @csrf
                      <input class="btn btn-outline-primary" type="submit" name="buyvip1" value="MUA" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </center>
        </div>
      </div>

      <div class="col-sm-5 card m-2 shadow">
        <div class="card-header">
          <center><h3>VIP 2</h3></center>
        </div>
        <div class="card-body">
          <span class="text-danger"><h5>* Đặc quyền: </h5></span>
          <ul>
            <li>Được trở thành đối tác uy tín của Farmcoin.</li>
            <li>Được hưởng hoa hồng của gói đối tác lên đến 25%/tuần.</li>
            <li>Được ưu đãi giảm 40% khi mua token THcoin trong đợt bán khởi đầu của dự án THcoin trên nền tảng blockchain.</li>
            <li>Được hưởng hoa hồng 20% khi người giới thiệu mua token THcoin khi mở dipo.</li>
            <center class="mt-5">
              Giá Ưu Đãi:
              <h4>
                @if($user->partner !== null && (int)$user->partner->vip === 1)
                3000
                @else
                5000
                @endif
                TH
              </h4>
            </center>
          </ul>
          <center>
            @if($user->partner !== null && (int)$user->partner->vip === 2)
            <button class="btn btn-outline-primary" style="opacity:0.5">ĐÃ MUA</button>
            @else
            <button class="btn btn-outline-primary"data-toggle="modal" data-target="#vip2">MUA</button>
            <div class="modal fade" id="vip2" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="unlocktittle">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    Bạn có muốn mua gói Vip2 không?
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Hủy</button>
                    <form method="post" />
                    @csrf
                    <input class="btn btn-outline-primary" type="submit" name="buyvip2" value="MUA" />
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endif
        </center>
      </div>
    </div>
  </div>

  <!-- Complain -->
  <span class="text-danger"><h5>* Thông tin thêm: </h5></span>
  <ul>
    <li>Đạt cấp độ 25 trở lên mới có thể tham gia mua Gói đầu tư.</li>
    <li>Do farmcoin mới ra mắt chưa có nhiều kinh phí nên chỉ nhận 10 người đầu tư đầu tiên đăng kí mua gói.</li>
    <li>Được hưởng 25% hoa hồng của các gói vip / tuần. Tiền sẽ được cộng vào ví đầu tư. Bạn có thể vào ví đầu tư và rút về tài khoản chính của mình</li>
    <li>Được hưởng hoa hồng khi mua token THcoin khi có người giới thiệu. số THcoin sẽ được cộng vào ví THcoin của mỗi người khi ra mắt dipo.</li>
    <li>Thời gian cộng tiền hoa hồng vào ngày cuối tuần hoặc đầu tuần sau của mỗi tuần.</li>
    <li>Farmcoin sắp tới sẽ tạo ra một token riêng là THcoin trên nền tảng Blockchain ETHEREUM với tiêu chuẩn kỹ thuật ERC20. Là một token tiện ích.</li>
    <li>Dự kiến đầu tháng 6 sẽ ra mắt lộ trình phát triển, whitepaper cho THcoin.</li>
    <li>Farmcoin là ứng dụng của THcoin nên sắp tới sẽ mở dipo trên farmcoin, nhằm tìm kiếm cộng đồng farmcoin. Đối tác với farmcoin có thể mua được giảm tới 40%. Đó là một lợi thế và xu hướng tích cực để token THcoin phát triển hơn nữa.</li>
    <li>Đây là cơ hội của các nhà đầu tư có thể nắm giữ một lượng THcoin trước khi lên sàn quốc tế..</li>
    <li>Thông tin mở dipo trên farmcoin sẽ được thông báo sau.</li>
  </ul>
  @endif

</div>
</div>
</div>

@endsection