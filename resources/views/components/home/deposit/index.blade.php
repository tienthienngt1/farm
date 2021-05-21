<div class="card-body">
  <center>
    <h3>
      Thông tin chuyển khoản.
    </h3>
  </center>
  <br>
  <p>
    Bạn cần chuyển khoản cho chúng tôi bằng một trong 2 cách:
  </p>
  <ul>
    <li>
      Sử dụng Internet Banking để chuyển khoản vào tài khoản của chúng tôi.
    </li>
    <li>
      Ra quầy giao dịch ngân hàng của bạn gần nhất, viết giấy chuyển khoản hoặc giấy nộp tiền mặt.
    </li>
  </ul>
  <p>
    Thông tin chuyển khoản / nộp tiền ghi đúng như dưới đây:
  </p>

  <!-- table-->
  <div class="table-responsive mt-5 mb-5">
    <table class="table table-border table-hover table-sm table-dark">
      <thead>
      </thead>
      <tbody>
        <tr>
          <td>Số tài khoản:</td>
          <td>1000108051998</td>
        </tr>
        <tr>
          <td>Tên chủ tài khoản:</td>
          <td>NGUYEN TIEN THIEN</td>
        </tr>
        <tr>
          <td>Ngân hàng:</td>
          <td>MBBANK</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- form -->
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="bank">Ngân hàng của bạn:</label>
      <input type="text" name="bank" class="form-control" placeholder="Ngân hàng" id="bank" required />
    </div>
    <div class="form-group">
      <label for="money">Số tiền nạp:</label>
      <input type="number" name="money" class="form-control" placeholder="Nhập số tiền cần nạp" id="money" required />
    </div>
    <input type="submit" class="btn btn-primary" name="sendM" value="Tạo lệnh" />
  </form>

  <!-- pay attention -->
  <div class="text-danger">
    <p>
      <h4>* Lưu ý: </h4>
    </p>
    <ul>
      <li>
        Tỉ giá quy đổi là 1TH = 1000₫
      </li>
      <li>
        Số tiền nạp tối thiểu là 100.000₫
      </li>
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