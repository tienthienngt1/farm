<div class="card mt-5">
  <div class="card-header">
    <center><h3>Ví THcoin</h3></center>
  </div>
  <div class="card-body">
    @if($wallet->isEmpty())
    <center>
      <span style="opacity:0.5">
        Chưa Kích Hoạt
      </span>
      <form method="post">
        @csrf
        <input type="submit" name="createWallet" value="Kích Hoạt ví" class="btn btn-primary m-4" />
      </form>
    </center>
    @else
    @foreach($wallet as $w)
    <center>
      <h2>Địa chỉ ví:</h2>
      <input id="address" style="background:none; border:none" type="text" value="{{$w->wallet}}" />
      <span class="btn btn-outline-primary m-3" id="coppy" onclick="copyToClipboard('#copy')">Copy</span>
    </center>
    <hr />
    <span>THcoin/TH: 1000</span>
    <center>
      <div class="m-5">
        <h3>Số Dư :</h3>
        <h2><span style="color:red">{{number_format($w->money)}} THcoin</span></h2>
        <span><h3> = {{ number_format($w->money/1000) }} TH</h3></span>
      </div>
    </center>
    @endforeach
    <center><h3>Lịch sử giao dịch gần đây</h3> </center>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Mã giao dịch</th>
            <th>Số tiền</th>
            <th>trạng thái</th>
            <th>Thời gian</th>
          </tr>
        </thead>
        <tbody>
          @foreach($buytoken as $bt)
          @if((int)$bt->user_id === (int) Auth::user()->id)
          <tr>
            <td>{{ $bt->hash }}</td>
            <td><span style="color:green"> +{{ number_format($bt->money) }}</span></td>
            <td><span style="color:green">Mua</span></td>
            <td>{{ $bt->created_at }}</td>
          </tr>
          @endif
          @endforeach
          @foreach($buytokenref as $br)
          @if((int)$br->user_id === (int) Auth::user()->id)
          <tr>
            <td>{{ $br->hash }}</td>
            <td><span style="color:green"> +{{ number_format($br->money) }}</span></td>
            <td><span style="color:green">Giới thiệu</span></td>
            <td>{{ $br->created_at }}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>

      @endif
    </div>
  </div>

  <script>
    function copyToClipboard(element) {
      var copyText = document.getElementById("address");
      copyText.select();
      copyText.setSelectionRange(0, 99999)
      document.execCommand("copy");
      alert('Copied!')
    }
  </script>