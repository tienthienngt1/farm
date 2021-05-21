@extends('layouts.app')

@section('content')
<?php $flag = true ?>
<div class="body2 load-hidden">
  <a href="/home/setting/2">Xem lịch sử giao dịch</a>
  <div class="card bg-none shadow">
    <div class="card-header">
      <center>
        <h2>
          NẠP TIỀN
        </h2>
      </center>
    </div>
    @isset($_GET['action'])
    @foreach ($deposit as $de)
    @if($de -> hash == $_GET['action'] )
    <?php $flag = false ?>
    <!-- Action -->
    <x-home.deposit.action :deposit='$de' />
    @endif
    @endforeach
    @endisset

    @if($flag == true)
    <!-- INDEX  -->
    <x-home.deposit.index />
    @endif
  </div>
</div>

@endsection