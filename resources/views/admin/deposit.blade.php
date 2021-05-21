@extends('layouts.app')

@section('content')
<a class="btn btn-outline-primary m-1" href="?action=balance">Balance</a>

<a class="btn btn-outline-primary m-1" href="?action=ref">Money Ref</a>
@if(isset($_GET['action']) && $_GET['action'] === 'ref')
<x-admin.moneyref :ref='$ref' />
@elseif(isset($_GET['action']) && $_GET['action'] === 'balance')
<x-admin.balance :balance='$balance' />
@else
<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th>stt</th>
        <th>email</th>
        <th>name</th>
        <th>hash</th>
        <th>money</th>
        <th>time</th>
        <th>status</th>
        <th>option</th>
      </tr>
    </thead>

    <tbody>
      @php $id=count($deposit) @endphp
      @foreach($deposit as $de)
      <tr>
        <td>{{$id }}</td>
        @php $id--@endphp
        <td>{{$de -> user -> email }}</td>
        <td>{{$de -> user -> name }}</td>
        <td>{{$de -> hash }}</td>
        <td>{{number_format($de -> money) }}</td>
        <td>{{$de -> created_at }}</td>
        <td>
          @if($de -> status == 1)
          <span class="text-success">Thành công</span>
          @elseif($de-> status == 0)
          <span class="text-danger">Đang xử lý...</span>
          @else
          <span class="text-danger">Thất bại</span>
          @endif
        </td>
        <td>
          <form method="post" onClick="return confirm('are you sure?') ">
            @csrf
            <input type="hidden" name="_id" value="{{$de->user_id}}" />
            <input type="hidden" name="_money" value="{{$de->money}}" />
            <input type="hidden" name="_hash" value="{{$de->hash}}" />
            <input type="submit" class="btn btn-primary" name="_submitOk" value="Ok" />
          </form>
          |
          <form method="post" onClick="return confirm('are you sure?') ">
            @csrf
            <input type="hidden" name="_id" value="{{$de->id}}" />
            <input type="hidden" name="_hash" value="{{$de->hash}}" />
            <input type="submit" class="btn btn-primary" name="_submitFail" value="Fail" />
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endif
@endsection