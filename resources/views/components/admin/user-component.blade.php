<!-- User  -->
<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#user">User</button>
<div id="user" class="collapse mt-3">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>level</th>
          <th>exp</th>
          <th>ip</th>
          <th>phone</th>
          <th>money</th>
          <th>roleAuth</th>
          <th>roleTopic</th>
          <th>levelFarm</th>
          <th>levelPet</th>
          <th>created_at</th>
          <th>option</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->level }}</td>
          <td>{{ $user->exp }}</td>
          <td>{{ $user->ip }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->money }}</td>
          <td>{{ json_decode($user->role) -> auth }}</td>
          <td>{{ json_decode($user->role) -> roleForum }}</td>
          <td>{{ json_decode($user->role) -> levelFarm }}</td>
          <td>{{ json_decode($user->role) -> levelPet }}</td>
          <td>{{ $user->created_at }}</td>
          <td>
            @if( json_decode($user -> role ) -> auth == 1)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ strtotime($user->created_at) }}">Ban
            </button>
            @else
            <span class="text-danger">Banned</span>
            @endif
          </td>
          <!-- Modal -->
          <div class="modal fade" id="modal{{ strtotime($user->created_at) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <center> Are you want to continue? </center>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post">
                    @csrf
                    <input type="hidden" value="{{ $user -> id }}" name="_id" />
                    <input type="submit" name="banned" class="btn btn-primary" value="Yes"></input>
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
{{ $users -> links() }}
</div>