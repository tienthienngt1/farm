<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

trait CheckRole
{
  public function checkRole($request) {
    if (!$this->guard()->attempt([
      'email' => $request->email,
      'password' => $request->password,
    ])) {
      throw ValidationException::withMessages(['banned' => ' Tài khoản hoặc mật khẩu không đúng!']);
    }
    if (Auth::user()->email === 'admin@farmcoin.xyz' || (int)json_decode(Auth::user()->role)->auth === 3) {
      return;
    }
    if (!$this->guard()->attempt([
      'email' => $request->email,
      'password' => $request->password,
      'role->auth' => 1,
    ])) {
      Auth::logout();
      throw ValidationException::withMessages(['banned' => 'Tài khoản bị khoá']);
    }
  }
}