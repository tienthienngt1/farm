<div class="mt-5 card">
  <div class="card-header">
    <center><h3>DANH SÁCH DỐI TÁC</h3> </center>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Cấp vip</th>
            <th>Ưu Đãi mua token</th>
            <th>Thời gian tham gia</th>
          </tr>
        </thead>
        <tbody>

          @if( $listpartner->isNotEmpty())
          @php $stt = 1; @endphp
          @foreach($listpartner as $l)
          <tr>
            <th>{{ $stt }}</th>
            <td>{{ $l -> user -> name }}</td>
            <td>
              @if ((int)$l->vip === 1)
              <span style="color:red">Cấp 1</span>
              @else
              <span style="color:red">Cấp 2</span>
              @endif
            </td>
            <td>
              <span style="color:green">{{ $l -> token }}%</span>
            </td>
            <td>{{ $l -> created_at }}</td>
          </tr>
          @php $stt++; @endphp
          @endforeach
          @else
          <th colspan="6">
            <center>
              <span style="opacity:0.5">
                Chưa có đối tác
              </span>
            </center>
          </th>
          @endif

        </tbody>
      </table>
    </div>
  </div>