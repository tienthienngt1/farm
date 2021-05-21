<div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Balance</th>
          <th>time</th>
        </tr>
      </thead>
      <tbody>
        @foreach($balance as $r)
        @if(json_decode($r->money)->balance > 10)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $r->name }}</td>
          <td>{{ json_decode($r->money)->balance }}</td>
          <td>{{ $r->created_at }}</td>
        </tr>
        @endif
        @endforeach
      </table>
    </div>
  </div>