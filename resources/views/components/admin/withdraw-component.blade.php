<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#withdraw">Withdraw</button>
<div id="withdraw" class="collapse mt-3">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Email</th>
          <th>Name</th>
          <th>STK</th>
          <th>bank</th>
          <th>Money</th>
          <th>Hash</th>
          <th>Status</th>
          <th>Time</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        @foreach($withdraw as $with)
        <tr>
          <td>{{ $with-> user -> email }}</td>
          <td>{{ $with-> user -> name }}</td>
          <td>{{ $with -> info -> stk }} </td>
          <td>{{ $with -> info -> bankname }} </td>
          <td>{{ $with-> money }}</td>
          <td>{{ $with-> hash }}</td>
          <td>
            @if($with -> status == 0)
            <span style="color:red"> Chưa xử lý</span>
            @elseif($with -> status == 1)
            <span class="text-success"> Hoàn thành</span>
            @else
            <span class="text-danger"> thất bại</span>

            @endif
          </td>
          <td>{{ $with-> created_at }}</td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ strtotime($with->created_at) }}">Ok
            </button>
            |
            <form method="post" onclick="return confirm('ok') ">
              @csrf
              <input type="hidden" value="{{ $with->user_id }}" name="_id" />
              <input type="hidden" value="{{ $with->money }}" name="_money" />
              <input type="hidden" value="{{ $with->hash }}" name="_hash" />
              <input type="submit" name="denywithdraw" class="btn btn-primary" value="Deny"></input>
          </form>
        </td>
        <!-- Modal -->
        <div class="modal fade" id="modal{{ strtotime($with->created_at) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <center> Are you want to continue? </center>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="post">
                  @csrf
                  <input type="hidden" value="{{ $with->user_id }}" name="_id" />
                  <input type="hidden" value="{{ $with->money }}" name="_money" />
                  <input type="hidden" value="{{ $with->hash }}" name="_hash" />
                  <input type="submit" name="withdraw" class="btn btn-primary" value="Yes"></input>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{ $withdraw ->links() }}
</div>