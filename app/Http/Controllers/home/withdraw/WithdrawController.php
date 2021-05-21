<?php

namespace App\Http\Controllers\home\withdraw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetUserRepositories;
use App\Models\home\Withdraw;
use Auth, Session;

class WithdrawController extends Controller
{
  use GetUserRepositories;

  protected function redirect() {
    return redirect ('home/withdraw');
  }

  protected function index() {
    $user = $this->getUser();
    return view('home.withdraw.index', ['user' => $user]);
  }

  protected function store(Request $request) {
    Session::flash('notifyError', ' Chưa trong thời gian rút tiền');
    return back();
    if (is_numeric($request->money) === false) {
      return back();
    }

    $roleForum = json_decode($this->getUser()->role)->roleForum;

    if ($request->money < 100) {
      Session::flash('notifyError', ' Số tiền rút không được nhỏ hơn 100TH');
      return back();
    }

    $old = json_decode($this->getUser()->money, true);

    if ($old['balance'] < $request->money) {
      Session::flash('notifyError', 'Bạn không đủ tiền để rút');
      return back();
    }
    if ($roleForum != 1) {
      Session::flash('notifyError', ' Bạn chưa đăng bài thanh toán. Vui lòng vào forum để đăng bài.');
      return back();
    }
    //changing money to pending
    $data = array_merge($old, [
      'balance' => $old['balance'] - $request->money,
      'pending' => $old['pending'] + $request->money,
    ]);
    $this->updateUser(['money' => json_encode($data)]);
    // log into withdraw table
    Withdraw::create([
      'user_id' => Auth::user()->id,
      'hash' => sha1(time()),
      'money' => $request->money,
      'status' => 0,
    ]);

    Session::flash('notify', ' Rút tiền thành công. Vui lòng chờ phản hồi');
    return back();
  }
}