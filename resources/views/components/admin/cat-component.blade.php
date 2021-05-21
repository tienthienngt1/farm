<!-- User  -->
<button type="button" class="btn btn-outline-primary" data-toggle="collapse" data-target="#Category">Category</button>
<div id="Category" class="collapse mt-3">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Categories</th>
          <th>Email</th>
          <th>Mã hash</th>
          <th>tittle</th>
          <th>content</th>
          <th>Like</th>
          <th>view</th>
          <th>comment</th>
          <th>time</th>
          <th>option</th>
        </tr>
      </thead>

      <tbody>
        @foreach($cats as $ca)
        <tr>
          <td>{{ $ca -> user -> name }}</td>
          <td>
            @if ( $ca -> category == 1)
            <span class="text-success">Hỏi đáp</span>
            @elseif( $ca -> category == 2)
            <span class="text-success">Thanh toán</span>
            @elseif( $ca -> category == 3)
            <span class="text-success">Trò chuyện</span>
            @elseif( $ca -> category == 4)
            <span class="text-success">Kết bạn</span>
            @endif
          </td>
          <td>{{ $ca -> user -> email }}</td>
          <td>{{ $ca -> hash }}</td>
          <td>{{ $ca -> tittle }}</td>
          <td>{{ $ca -> content }}</td>
          <td>{{ $ca -> like }}</td>
          <td>{{ $ca -> view }}</td>
          <td>{{ $ca -> comment }}</td>
          <td>{{ $ca -> created_at }}</td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ strtotime($ca->created_at) }}">Delete
            </button>
          </td>
          <!-- Modal -->
          <div class="modal fade" id="modal{{ strtotime($ca->created_at) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <center> Are you want to continue? </center>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="post">
                    @csrf
                    <input type="hidden" value="{{ $ca -> hash }}" name="_hash" />
                    <input type="hidden" value="{{ $ca -> id }}" name="_id" />
                    <input type="submit" name="category" class="btn btn-primary" value="Yes"></input>
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
{{ $cats -> links() }}
</div>