<div class="card mt-5">
  <div class="card-header">
    <center><h3>Giao Dịch THcoin</h3></center>
  </div>
  <div class="card-body">
    <center>
      <small><em>THcoin giao dịch tài sản số đem lại trải nghiệm số cá nhân hoá cho toàn thể nhà đầu tư</em></small>
    </center>
    @php $amount = DB::table('thcoinmounts')->first(); @endphp
    <center><h1><span style="color:red">{{ number_format($amount->amount)}}</span> THcoin</h1></center>
    @if($amount->status === 1)
    <div class="float-right text-success mb-2">
      Đang mở
    </div>
    @else
    <div class="float-right text-danger mb-2">
      Chưa Mở
    </div>
    @endif
    <div class="clearfix"></div>
    <!-- Button trigger modal -->
    @if($amount->status === 1)
    <button type="button" class="btn btn-outline-primary btn-block btn-lg" data-toggle="modal" data-target="#buyTH">MUA
    </button>
    @else
    <button type="button" style="opacity:0.5" class="btn btn-outline-primary btn-block btn-lg"> CHƯA MỞ
    </button>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="buyTH" tabindex="-1" role="dialog" aria-labelledby="buyTHcoin" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              <p>
                Số lượng mua:
              </p>
              <input type="number" name="amountTHcoin" onkeyup="document.getElementById('mon').innerHTML = this.value*0.001+ ' TH' ;" /><br />
            </div>
            <center>Số tiền phải trả: <span style="color:red" id="mon"></span></center>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              @csrf
              <input type="submit" name="buyTHcoin" class="btn btn-outline-primary" value="MUA"></input>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->
  <!-- info token -->
  <div class="d-flex justify-content-between mt-3 mb-3">
    <div>
      Giá:
    </div>
    <div>
      1TH = 1000THcoin
    </div>
  </div>
  <div class="d-flex justify-content-between mt-3 mb-3">
    <div>
      Khối lượng:
    </div>
    <div>
      100,000,000 THcoin
    </div>
  </div>
  <div class="d-flex justify-content-between mt-3 mb-3">
    <div>
      Đã bán:
    </div>
    <div>
      @php $percent = round(100-(int)($amount->amount*100)/100000000, 2) @endphp
      {{ $percent}} %
    </div>
  </div>
  <div class="progress mb-3">
    <div class="progress-bar" style="width:{{ $percent }}%">
      {{ $percent }}%
    </div>
  </div>
  <div class="d-flex justify-content-between mt-3 mb-3">
    <div>
      Ngày kết thúc:
    </div>
    <div>
      1/6/2021 20:00:00
    </div>
  </div>
</div>
</div>
</div>