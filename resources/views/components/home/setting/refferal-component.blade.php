

@php 
$flag=true;
$stt =0;
if(isset($_GET['page'])){
  $stt = 15*$_GET['page'] - 15;
}
@endphp
<div class="card-header">
  <center>
    <h3>Hệ Thống Giới Thiệu</h3>
  </center>
</div>

<div class="card-body">
        <div class="table-responsive mt-3">
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Level</th>
                <th scope="col">Tiền thưởng</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Thời gian</th>
              </tr>
            </thead>
            <tbody>
          @if($ref)
            @foreach($ref as $re)
              @php $flag=false;$stt++;@endphp
              <tr>
                <td>{{$stt}}</td>
                <th scope="row">{{ $re->user->name }}</th>
                <td>{{ $re->user->level }}</td>
                <td><span class="text-success" >{{ $re->money }} TH</span> </td>
                <td>
                  @if($re->name == 1)
                    Đăng kí
                  @else
                  Mở khoá {{$re->name}}
                  @endif
                </td>
                <td>{{ $re->created_at }}</td>
              </tr>
              @endforeach
            @endif
            </tbody>
          </table>
          @if($flag===true)
            <center>
              <div style='opacity:0.5'>Trống</div>
            </center>
          @endif
        </div>
       <div class="d-flex justify-content-center">
         {{ $ref->links() }}
       </div>
</div>