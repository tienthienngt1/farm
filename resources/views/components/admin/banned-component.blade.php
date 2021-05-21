<!-- User  -->
<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#banned">Banned</button>
<div id="banned" class="collapse mt-3">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>time</th>
          <th>option</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($banned as $ban)
        @if(json_decode($ban -> role) -> auth == 2)
        <tr>
          <td>{{ $ban->id }}</td>
          <td>{{ $ban->name }}</td>
          <td>{{ $ban->email }}</td>
          <td>{{ $ban->created_at }}</td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $ban->id }}">open
            </button>
          </td>
          <!-- Modal -->
          <div class="modal fade" id="modal{{ $ban->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <center> Are you want to continue? </center>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post">
                    @csrf
                    <input type="hidden" value="{{ $ban -> id }}" name="_id" />
                    <input type="submit" name="ban" class="btn btn-primary" value="Yes"></input>
                </form>
              </div>
            </div>
          </div>
        </div>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
</div>