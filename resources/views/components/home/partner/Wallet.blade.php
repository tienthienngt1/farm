<div class="card mt-4">
  <div class="card-header">
    <center><h3> Ví </h3></center>
  </div>
  <div class="card-body">
    <center>
      <h1>
        @if(empty($wallet->partner))
        <span style="color:red">0 TH</span>
        @else
        <span style="color:red">{{$wallet->partner->wallet}} TH</span>
        @endif
      </h1>
      @if(empty($wallet->partner))
      <button class="btn btn-outline-primary" style="opacity:0.5">CHƯA KÍCH HOẠT</button>
      @else
      <form method="post">
        @csrf
        <input type="submit" name="withdraw" value="Rút" class="btn btn-outline-primary" />
      </form>
      @endif
    </center>
  </div>
</div>