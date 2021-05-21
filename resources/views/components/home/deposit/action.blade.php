<div class="card-body">
  <center>
    <h3>
      Thực hiện lệnh chuyển khoản
    </h3>
  </center>
  <p>
    Trạng thái:
    @if($deposit -> status == 0)
    <div class="spinner-border text-danger" role="status">
      <span class="sr-only"></span>
    </div>
    <span class="text-danger">Đang chờ...</span>
    @elseif($deposit -> status == 1)
    <span class="text-success"><i class="fas fa-check-circle"></i>Thành công.</span>
    @else
    <span class="text-danger"><i class="fas fa-exclamation-circle"></i>Thất bại</span>
    @endif
  </p>

  <h3>Thông tin chuyển khoản</h3>
  <!-- table-->
  <div class="table-responsive mt-5 mb-5">
    <table class="table table-border table-hover table-dark">
      <thead>
      </thead>
      <tbody>
        <tr>
          <td>Số tài khoản:</td>
          <td>
            1000108051998
          </td>
        </tr>
        <tr>
          <td>Tên chủ tài khoản:</td>
          <td>NGUYEN TIEN THIEN</td>
        </tr>
        <tr>
          <td>Ngân hàng:</td>
          <td>MBBANK</td>
        </tr>
        <tr>
          <td>Số Tiền:</td>
          <td>{{ $deposit -> money }} ₫</td>
        </tr>
        <tr>
          <td>Nội dung:</td>
          <td>{{ strtolower(str_replace(' ', '',$deposit -> user->name)) }}{{$deposit->money}}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- pay attention -->
  <div class="text-danger">
    <p>
      <h4>* Lưu ý: </h4>
    </p>
    <ul>
      <li>
        Trong lúc bạn thực hiện chuyển khoản, chúng tôi sẽ liên tục kiểm tra
      </li>
      <li>
        Ngay khi bạn chuyển khoản thành công. Tài khoản của bạn sẽ được cộng tiền.
      </li>
      <li>
        Bạn chú ý ghi rõ và đúng nội dung chuyển khoản.
      </li>
      <li>
        Nếu bạn chưa nhận được tiền khi đã chuyển khoản xong 15p. Hãy liên hệ chúng tôi ngay để kịp thời giải quyết.
      </li>
    </ul>
  </div>
</div>
<script>
  function coppy() {
    /* Get the text field */
    var copyText = document.getElementById("stk");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
  }
</script>