<div class="card-header">
  <center>
    <h3>Lịch Sử Nạp Tiền</h3>
  </center>
</div>

<div class="card-body">
  <div class="table-responsive mt-3">
    <table class="table table-border table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Mã giao dịch</th>
          <th scope="col">Số tiền</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thời gian</th>
          <th scope="col">Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
        @foreach($deposit as $de)
        <tr>
          <th scope="row">{{$de->hash}}</th>
          <td>{{ $de->money }}</td>
          <td>
            @if($de -> status == 0)
            <span class="text-danger">Đang xử lý</span>
            @elseif($de -> status == 1)
            <span class="text-success">Thành công</span>
            @else
            <span class="text-danger">Thất bại</span>
            @endif
          </td>
          <td>{{ $de->created_at }}</td>
          <td><a class="text-primary" href="/home/deposit?action={{$de->hash}}">Xem chi tiết</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>