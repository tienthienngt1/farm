

<div class="card-header">
  <center>
    <h3>Đổi Mật Khẩu</h3>
  </center>
</div>

<div class="card-body">
  
    <form method="POST" action="{{ route('setting.store') }}">
      @csrf
      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __(' Mật khẩu cũ: ') }}</label>

          <div class="col-md-6">
            <div class="input-group">
              <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon12"><i class="fas fa-key"></i></span>
              </div>
              <input id="password" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" autocomplete="new-password" aria-describedby="basic-addon12" required value="{{ old('oldPassword') }}">

              @error('oldPassword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
          </div>
      </div>
      
      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __(' Mật khẩu mới: ') }}</label>

          <div class="col-md-6">
            <div class="input-group">
              <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon12"><i class="fas fa-key"></i></span>
              </div>
              <input id="password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" autocomplete="new-password" aria-describedby="basic-addon12" required value="{{ old('newPassword') }}">

              @error('newPassword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
          </div>
      </div>

      <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' Nhập lại mật khẩu: ') }}</label>

          <div class="col-md-6">
           <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon14"><i class="fas fa-key"></i></span>
              </div>
              <input id="password-confirm" type="password" class="form-control" name="newPassword_confirmation" autocomplete="new-password" aria-describedby ="basic-addon14" required>
          </div>
          </div>
      </div>
      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <input type="submit" class="btn btn-success" name="changePass" value="Đổi Mật Khẩu"/>
          </div>
      </div>
  </form>
</div>