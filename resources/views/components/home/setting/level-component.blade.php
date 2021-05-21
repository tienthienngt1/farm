
<div class="card-header">
  <center>
    <h3>Thông tin cấp bậc</h3>
  </center>
</div>

<div class="card-body">
      <div class="table-responsive mt-3">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Cấp độ</th>
                <th scope="col">Exp</th>
              </tr>
            </thead>
            <tbody>
              @foreach($level as $lv)
              <tr>
                <td>{{ $lv->id }} </td>
                <td>{{ $lv -> exp }} </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
  
</div>