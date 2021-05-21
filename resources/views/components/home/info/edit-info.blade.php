
<div class="body2 load-hidden">
  <form method="post">
    @csrf
    
      <div class="form-group row">
        <label for="bankname" class="col-md-4 col-form-label text-md-right">Tên ngân hàng:</label>
        <div class="col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1"><i class="fas fa-university"></i></span>
            </div>
            <input id="bankname" type="text" class="form-control @error('bankname') is-invalid @enderror" name="bankname" value="{{ $info->bankname}}" aria-describedby="basic-addon1" required >
              @error('bankname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
      </div>
    
      <div class="form-group row">
        <label for="stk" class="col-md-4 col-form-label text-md-right">STK:</label>
        <div class="col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text" id="stkgroup"><i class="fas fa-money-check"></i></span>
            </div>
            <input id="stk" type="number" class="form-control @error('stk')is-invalid @enderror" name="stk" value="{{ $info->stk }}" aria-describedby="stkgroup" required >
              @error('stk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
      </div>
    
      <div class="form-group row">
        <label for="brand" class="col-md-4 col-form-label text-md-right">Chi nhánh:</label>
        <div class="col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text" id="brandgroup"><i class="fas fa-map-marker"></i></span>
            </div>
            <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ $info->brand }}" aria-describedby="brandgroup" required >
              @error('brand')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>
      </div>
      <center>
        <input type="submit" name="saveEdit" value="Lưu" class="btn btn-primary" />
      </center>
  </form>
</div>

