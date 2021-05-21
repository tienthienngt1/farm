<?php

namespace App\Http\Controllers\home\deposit;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Auth, Session;

class DepositController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $de = Deposit::where('user_id', Auth::user()->id)->get();
    if (isset($_GET['action'])) {
      //
    }
    return view('home.deposit.index', ['deposit' => $de]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    if ($request->sendM) {
      return $this->handleSendM($request);
    }
    return back();
  }

  //return function handleSendM
  protected function handleSendM($request) {
    if ((int)$request->money < 100000) {
      Session::flash('notifyError',
        ' Lệnh nạp ít nhất 100.000₫');
      return back();
    }
    $hash = md5(time());
    $url = $request->route()->uri."?action=".$hash;
    $data = array_merge($request->except(['_token', 'sendM']),
      ['hash' => $hash,
        'status' => 0,
        'user_id' => Auth::user()->id]);
    Deposit::create($data);
    Session::flash('notify',
      ' Tạo lệnh nạp tiền thành công');
    return redirect($url);
  }


}