@extends('layouts.app')

@section('content')
@if((int)json_decode($user->role)->auth === 1)
<div class="body2 load-hidden">
  <div class="card bg-none shadow">
    <div class="card-header">
      <center>
        <h2>
          LAUNCHPAD
        </h2>
      </center>
    </div>
    <div class="card-body">
      <center style="opacity:0.7"><h3>Sắp ra mắt</h3></center>
    </div>
  </div>
</div>
@else

<div class="body2 load-hidden">
  <div class="card bg-none shadow">
    <div class="card-header">
      <center>
        <h2>
          LAUNCHPAD
        </h2>
      </center>
    </div>
    <div class="card-body">
      <center>
        <a href="/home/launchpad?action=wallet" class="btn

          @if(isset($_GET['action']) and $_GET['action']=='wallet')
          btn-primary
          @else
          btn-outline-primary
          @endif
          m-1">Ví THcoin</a>

        <a href="?action=buy" class="btn
          @if(isset($_GET['action']) and $_GET['action']=='buy')
          btn-primary
          @else
          btn-outline-primary
          @endif
          m-1">Mua THcoin</a>


        <a href="?action=change" class="btn
          @if(isset($_GET['action']) and $_GET['action']=='change')
          btn-primary
          @else
          btn-outline-primary
          @endif
          m-1">Quy Đổi</a>

        <a href="/home/launchpad" class="btn
          @if(isset($_GET['action']))
          btn-outline-primary
          @else
          btn-primary
          @endif
          m-1">Chi tiết giao dịch</a>
      </center>
      @php
      $get = null;
      if(isset($_GET['action'])){
      $get = $_GET['action'];
      }
      @endphp
      @if($get === 'buy')
      <x-home.launchpad.buy />
      @elseif($get=== 'wallet')
      <x-home.launchpad.wallet :wallet='$wallet' :buytoken='$buytoken' :buytokenref='$buytokenref' />
      @elseif($get=== 'change')
      <center class="m-4">
        <h2>Địa chỉ ví:</h2>
        <input id="address" style="background:none; border:none" type="text" value="<?php if ($user->thcoin === null) { echo 'ban chua tao vi'; } else { echo $user->thcoin->wallet; } ?>" />
        <span class="btn btn-outline-primary m-3" id="coppy" onclick="copyToClipboard('#copy')">Copy</span>
        <h4>Số dư: <span style="color:red">{{number_format($user->thcoin->money) }} THcoin</span></h>
        <h5> Giá trị quy đổi:<br> <span style="color:red">1TH = 500THcoin</span></5>

      </center>
      <button type="button" class="btn btn-outline-primary btn-block btn-lg" data-toggle="modal" data-target="#changeTH">QUY ĐỔI
      </button>
      <!-- Modal -->
      <div class="modal fade" id="changeTH" tabindex="-1" role="dialog" aria-labelledby="buyTHcoin" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form method="post">
              <div class="modal-header">
                <p>
                  Số lượng THcoin quy đổi:
                </p>
                <input type="number" name="amountTHcoin" onkeyup="document.getElementById('m').innerHTML = this.value*0.002+ ' TH' ;" placeholder="Số THcoin" /><br />
              </div>
              <center>Số TH nhận được:: <span style="color:red" id="m"></span></center>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @csrf
                <input type="submit" name="changeTHcoin" class="btn btn-outline-primary" value="QUY ĐỔI"></input>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
    @else
    <x-home.launchpad.detail :buytoken='$buytoken' />
    @endif
  </div>
</div>
</div>
@endif

<script>
function copyToClipboard(element) {
var copyText = document.getElementById("address");
copyText.select();
copyText.setSelectionRange(0, 99999)
document.execCommand("copy");
alert('Copied!')
}
</script>
@endsection