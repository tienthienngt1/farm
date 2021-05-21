<?php

namespace App\Http\Controllers\home\partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\home\Partner;
use App\Models\User;
use DB, Session, Auth;

class PartnerController extends Controller
{
  public function index() {
    $partner = Partner::orderByDesc ('created_at')->get();
    return view('home.partner.index', ['partner' => $partner]);
  }

  //getUserID
  public function getId() {
    return Auth::user()->id;
  }

  //getUser
  public function getUser() {
    return User::find($this->getID());
  }

  //getUser
  public function getBalance() {
    return json_decode($this->getUser()->money)->balance;
  }

  public function store(Request $request) {

    //handle buy vip 1
    if ($request->buyvip1) {
      $getUser = $this->getUser();;
      $getLv = $getUser->level;
      if ((int)$getLv < 25) {
        Session::flash('notifyError', ' Bạn chưa đạt được cấp độ 25!');
        return back();
      }
      $getBalance = $this->getBalance();
      if ((int)$getBalance < 2000) {
        Session::flash('notifyError', ' Bạn không đủ TH để mua Vip!');
        return back();
      }

      if ($this->getUser()->partner !== null) {
        return back();
      }
      // handle buy vip
      Partner::insert([
        'user_id' => $this->getID(),
        'wallet' => 0,
        'vip' => 1,
        'token' => 25
      ]);
      // minus balance
      User::where('id', $this->getID())->update(['money->balance' => $getBalance - 2000]);

      //rerurn
      Session::flash('notify', ' Chúc mừng bạn đã trở thành đối tác của farmcoin, Bạn được hưởng các ưu đãi của gói VIP1 đối tác!');
      return back();
    }

    //Handle buy Vip 2
    if ($request->buyvip2) {
      $getUser = $this->getUser();

      $getLv = $getUser->level;

      if ((int)$getLv < 25) {
        Session::flash('notifyError', ' Bạn chưa đạt được cấp độ 25!');
        return back();
      }

      //handle with people not vip
      $getVip = $getUser->partner;
      $money = 0;
      if ($getVip === null) {
        $money = 5000;
      }
      if ($getVip !== null && (int)$getVip->vip === 1) {
        $money = 3000;
      }
      if ($getVip !== null && (int)$getVip->vip === 2) {
        return back();
      }
      if ($money === 0) {
        return back();
      }
      $getBalance = $this->getBalance();
      if ((int)$getBalance < $money) {
        Session::flash('notifyError', ' Bạn không đủ TH để mua Vip!');
        return back();
      }

      // handle buy vip
      if ($money === 5000) {
        Partner::insert([
          'user_id' => $this->getID(),
          'wallet' => 0,
          'vip' => 2,
          'token' => 40
        ]);
      }
      if ($money === 3000) {
        Partner::where('user_id', $this->getID())->update([
          'vip' => 2,
          'token' => 40
        ]);
      }
      // minus balance
      User::where('id', $this->getID())->update(['money->balance' => $getBalance - $money]);

      //rerurn
      Session::flash('notify', ' Chúc mừng bạn đã trở thành đối tác của farmcoin, Bạn được hưởng các ưu đãi của gói VIP2 đối tác!');
      return back();
    }

    //handle withdraw
    if ($request->withdraw) {
      $this->withdraw ();
    }
    return back();
  }

  //return withdraw function
  public function withdraw() {
    if ($this->getUser()->partner === null) {
      Session::flash('notifyError', ' Bạn không có quyền thực hiện!');
      return back();
    } else {
      if ((int)$this->getUser()->partner->wallet === 0) {
        Session::flash('notifyError', ' Bạn không có tiền trong ví để thực hiện rút!');
        return back();
      }

      //add balance
      User::where('id', $this->getID())->update(['money->balance' => (int)$this->getBalance() + (int)$this->getUser()->partner->wallet]);
      //minus wallet patner
      Partner::where('user_id', $this->getID())->update(['wallet' => 0]);
      //return
      Session::flash('notify', ' Chuyển thành công!');
      return back();

    }
    Session::flash('notifyError', ' Lỗi hệ thống!');
    return back();

  }

}


