<?php

namespace App\Http\Controllers\home\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Refferal;
use App\Models\User;
use Session, Auth;

class handleDepositController extends Controller
{

  public function index() {
    $balance = User::all()->sortByDesc('money->balance');
    $ref = Refferal::orderByDesc ('money')->get();
    $deposit = Deposit::orderByDesc('created_at')->get();
    return view('admin.deposit', [
      'deposit' => $deposit,
      'ref' => $ref,
      'balance' => $balance
    ]);
  }

  public function store(Request $request) {
    if ($request->_submitOk) {
      return $this->submitOk($request);
    }

    if ($request->_submitFail) {
      return $this->submitFail($request);
    }
    return $request->route();
  }

  protected function submitOk($request) {

    $getMoney = json_decode(User::find($request->_id)->money)->balance;

    User::where('id', $request->_id)->update(['money->balance' => $getMoney + $request->_money/1000 + ($request->_money/1000)*0.20]);
    Deposit::where(['user_id' => $request->_id, 'hash' => $request->_hash])->update(['status' => 1]);
    session::flash('notify', 'ok');
    return back();
  }

  protected function submitFail($request) {
    Deposit::where(['id' => $request->_id, 'hash' => $request->_hash])->update(['status' => 2]);
    session::flash('notify', 'ok');
    return back();
  }
}