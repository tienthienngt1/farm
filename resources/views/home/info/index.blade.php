@extends('layouts.app')

@section('content')

<div class="container-fluid body2 load-hidden">
  <a class="mt_5" href="@isset($_GET['edit']) /home/info @else{{ route('home') }}@endisset">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
  </a>
    <div class="card bg-none mt-5">
      @isset($_GET['edit'])
      
      <div class="card-header">
        <center>
          <h3>Chỉnh sửa thông tin</h3>  
        </center>
      </div>
      
      <div class="card-body">
        <x-home.info.edit-info :info='$info'/>
      </div>
    </div>
      
      @else
      <div class="card-header">
        <center>
          <h3>Thông tin cá nhân</h3>  
        </center>
      </div>
      <div class="card-body">
         <center>
          {!! Avatar::create(Auth::user()->name)->setDimension(100)->setFontSize(30)->toSvg() !!}
        </center>
        <div class="row justify-content-center">
            <div class="mt-4 col-6">
             <center> Cấp độ: <span style="font-size:25px">{{$info->level}}</span> </center>
            </div>
            <div class="mt-4 col-6">
              Exp: <span style="font-size:25px">{{$info->exp}} </span>
            </div>
         
            <div class="mt-4 col-10">
              Số dư: <span style="font-size:25px">{{json_decode($info->money)->balance}} </span>TH
            </div>
            <div class="mt-4 col-10">
              Tiền giới thiệu: <span style="font-size:25px">{{json_decode($info->money)->referal}} </span>TH
            </div>
            <div class="mt-4 col-10">
              Mã giới thiệu: <span style="font-size:18px">{{$info->refferal->refferal}}</span>
            </div>
            <div class="mt-4 col-10">
              Số tiền đang rút: <span style="color:red;font-size:25px">{{json_decode($info->money)->pending}}TH</span>
            </div>
            <div class="mt-4 col-10">
              Số tiền đã rút: <span style="font-size:25px" class="text-success">{{json_decode($info->money)->withdraw}}TH</span>
            </div>
         </div>
        <hr>
        <!-- --------------------->
        <div>
          <div class="mt-3">
            Email: {{$info->email}}
          </div>
          <div class="mt-3">
            Tên thật: {{$info->name}}
          </div>
          <div class="mt-3">
            STK: @isset($info->info){{$info->info->stk}}@else Chưa cập nhật @endisset
          </div>
          <div class="mt-3">
            Ngân hàng: @isset($info->info){{$info->info->bankname}}@else Chưa cập nhật @endisset
          </div>
          <div class="mt-3">
            Chi nhánh: @isset($info->info){{$info->info->brand}}@else Chưa cập nhật @endisset
          </div>
          <center>
             <a class="btn btn-link" href="?edit=1"><i class="fas fa-user-edit"></i> Chỉnh sửa </a>
          </center>
        </div>
      </div>
      @endisset
  
</div>
<script>
function function() {
  /* Get the text field */
  var copyText = document.getElementById("text");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

@endsection