@php
$stt = 0;
if(isset($_GET['page'])){
$stt = 15 * $_GET['page'] - 15;
}
@endphp
<div class="card-header">
  <center>
    <h3>Lịch sử rút tiền</h3>
  </center>
</div>

<div class="card-body">
  <div class="table-responsive mt-3">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Số tiền rút</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Mã rút tiền</th>
          <th scope="col">Thời gian</th>
        </tr>
      </thead>
      <tbody>
        @foreach($withdraw as $with)
        @php $stt++ @endphp
        <tr>
          <th scope="row">{{ $stt }}</th>
          <td>{{ $with -> money}}TH</td>
          <td>
            @if($with -> status === "0")
            <span style="color:red">Đang xử lý</span>
            @elseif($with -> status === "1")
            <span class="text-success">Thành công</span>
            @else
            <span style="color:red">Thất bại</span>
            @endif
          </td>
          <td>{{ $with->hash }}</td>
          <td>{{ $with->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>