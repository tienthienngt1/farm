<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#info">Info</button>
<div id="info" class="collapse mt-3">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Email</th>
          <th>BankName</th>
          <th>STK</th>
          <th>Full Name</th>
          <th>Bank</th>
          <th>Status</th>
          <th>Time</th>
          <th>Option</th>
        </tr>
      </thead>

      <tbody>
        @foreach ( $info as $inf )
        <tr>
          <td>{{ $inf -> user -> email }}</td>
          <td>{{ $inf -> bankname }} </td>
          <td>{{ $inf -> stk }} </td>
          <td>{{ $inf -> user -> name }} </td>
          <td>{{ $inf -> brand }} </td>
          <td>
            @if($inf -> role == 1)
            <span class="text-success">Đã cập nhật</span>
            @else
            <span class="text-danger">Chưa cập nhật</span>
            @endif
          </td>
          <td>{{ $inf -> created_at }} </td>
          <td>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $inf->id }}">Change
            </button>
          </td>
          <!-- Modal -->
          <div class="modal fade" id="modal{{ $inf->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <center> Are you want to continue? </center>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post">
                    @csrf
                    <input type="hidden" value="{{ $inf -> id }}" name="_id" />
                    <input type="submit" name="changeInfo" class="btn btn-primary" value="Yes"></input>
                </form>
              </div>
            </div>
          </div>
        </div>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $info -> links() }}
</div>