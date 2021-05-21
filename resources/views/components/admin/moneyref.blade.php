<div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Balance</th>
          <th>ref</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ref as $r)
        <tr>
          <td>{{ $r->user->id }}</td>
          <td>{{ $r->user->name }}</td>
          <td>{{ json_decode($r->user->money)->balance }}</td>
          <td>{{ $r->money }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>