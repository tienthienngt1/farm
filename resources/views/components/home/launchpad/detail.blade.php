<div class="card mt-5">
  <div class="card-header">
    <center><h3>Lịch sử giao dịch</h3></center>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>STT</th>
            <th>Địa chỉ ví</th>
            <th>Số THcoin</th>
            <th>Mã giao dịch</th>
            <th>Trạng thái</th>
            <th>Thời gian</th>
          </tr>
        </thead>
        <tbody>
          @php $stt = 1 @endphp
          @foreach($buytoken as $bt)
          <tr>
            <td>{{$stt}}</td>@php $stt++ @endphp
            <td><input style="background:none;border:none" type="text" value="{{ $bt->thcoin->wallet }}" /></td>
            <td><span style="color:green">+{{ number_format($bt->money) }}</span></td>
            <td>{{ $bt->hash }}</td>
            <td><span style="color:green">Mua</span></td>
            <td>{{ $bt->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $buytoken -> links() }}
  </div>
</div>