<?php

namespace App\Http\Controllers\home\launchpad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\home\Thcoin;
use App\Models\home\Buytoken;
use App\Models\home\Buytokenref;
use DB, Session, Auth;

class LaunchpadController extends Controller
{
  public function getIdUser() {
    return (int)Auth::user()->id;
  }
  public function index() {
    $wallet = Thcoin::where('user_id', $this->getIdUser())->get();
    $buytoken = Buytoken:: orderByDesc ('created_at')->paginate(50, '*', 'gd');
    $buytokenref = Buytokenref::get();
    return view('home.launchpad.index', [
      'wallet' => $wallet,
      'buytokenref' => $buytokenref,
      'buytoken' => $buytoken,
    ]);
  }

  public function store(Request $request) {
    //create wallet
    if ($request->createWallet) {
      $this->createWallet();
      return back();
    }
    //Buy THcoin
    if ($request->buyTHcoin) {
      $this->buyTHcoin($request);
      return back();
    }
    // change
    if ($request->changeTHcoin) {
      session::flash('notifyError', 'Chưa đến thời gian quy đổi! Vui lòng chờ!');
      return back();
    }
  }

  /**
  * return Address
  * */
  public function createWallet() {
    $checkWalletAvailable = Thcoin::where('user_id', $this->getIdUser())->count();
    if ($checkWalletAvailable !== 0) {
      session::flash('notifyError', ' Bạn đã có địa chỉ ví rồi!');
      return;
    }

    //create address wallet
    $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $addressWallet = str_shuffle($char);
    if (Thcoin::where('wallet', $addressWallet)->count() !== 0) {
      session::flash('notifyError', 'Lỗi, xin mời tạo lại');
      return;
    }

    Thcoin::insert([
      'user_id' => $this->getIdUser(),
      'wallet' => $addressWallet,
      'money' => 0,
      'status' => 1,
    ]);
    session::flash('notify', ' Tạo ví thành công!');
    return;
  }

  /**
  * handle buyTHcoin
  * */
  public function buyTHcoin($request) {
    if (DB::table('thcoinmounts')->first()-> status === 0) {
      Session::flash('notifyError', ' Chưa mở');
      return;

    }
    //Check amount is number
    if (!is_int((int)$request->amountTHcoin)) {
      return;
    }

    //check amount upper 1000TH
    if ((int)$request->amountTHcoin < 1000) {
      Session::flash('notifyError', 'Số lượng mua tối thiểu là 1000THcoin!');
      return;
    }
    if ($partner = $this->isPartner($this->getIdUser())) {
      if ($partner->vip === 1) {
        $money = ($request->amountTHcoin/1000)*75/100;
      }
      if ($partner->vip === 2) {
        $money = ($request->amountTHcoin/1000)*60/100;
      }
    } else {
      $money = $request->amountTHcoin/1000;
    }

    //handle when not enough balance
    if ($this->getBalance($this->getIdUser()) < $money) {
      session::flash('notifyError', ' Bạn không đủ tiền!');
      return;
    }

    //check user_ref is partner
    $getUserRef = null;
    $getUserRef = DB::table('refferals')->where('user_id', $this->getIdUser())->first()->ref_id;
    $checkAddress = DB::table('thcoins')->where('user_id', $this->getIdUser())->first();
    if ($checkAddress === null) {
      session::flash('notifyError', ' Bạn chưa tạo ví!');
      return;
    }

    if ($getUserRef !== null) {
      if ($is_partner = $this->isPartner($getUserRef)) {
        //check is user created address
        $checkAddress = DB::table('thcoins')->where('user_id', $getUserRef)->first();
        if ($checkAddress !== null) {
          //handle ref partner'
          $getVip = (int)$is_partner->vip;
          if ($getVip === 1) {
            $tokenRef = ((int)$request->amountTHcoin*10)/100;
          }
          if ($getVip === 2) {
            $tokenRef = ((int)$request->amountTHcoin*20)/100;
          }

          //total Token balance user ref
          $totalToken = $tokenRef + $this->getTHcoinUserRef($getUserRef);

          //update $totalToken
          $this->updateTokenRef($getUserRef, $totalToken);

          //log into buytokenrefs
          DB::table('buytokenrefs')->insert([
            'user_id' => $getUserRef,
            'hash' => md5(time().rand(0, 999999)),
            'money' => $tokenRef,
          ]);
        }

      }
    }
    //minus balance
    DB::table('users')->where('id', $this->getIdUser())->update([
      'money->balance' => $this->getBalance($this->getIdUser()) - $money,
    ]);

    //add token
    $this->updateTokenRef($this->getIdUser(), $this->getTHcoinUserRef($this->getIdUser()) + $request->amountTHcoin);

    //minus token in pool
    $getTokenPool = DB::table('thcoinmounts')->first()->amount;
    DB::table('thcoinmounts')->update([
      'amount' => (int)($getTokenPool - (int)$request->amountTHcoin),
    ]);

    //log buytokens
    DB::table('buytokens')->insert([
      'user_id' => $this->getIdUser(),
      'user_ref' => $getUserRef,
      'hash' => md5(time().rand(0, 99999)),
      'money' => (int)$request->amountTHcoin,
    ]);
    session::flash('notify', 'Mua thành công');
    return;
    //
  }


  //check user is partner
  public function isPartner($id) {
    return DB::table('partners')->where('user_id', $id)->first();

  }

  // Update updateBalance user
  public function updateTokenRef($id, $money) {
    return DB::table('thcoins')->where('user_id', $id)->update([
      'money' => $money,
    ]);
  }

  //grt THcoin user ref
  public function getTHcoinUserRef($id) {
    return DB::table('thcoins')->where('user_id', $id)->first()->money;
  }

  //get balance user
  public function getBalance($id) {
    return (int)json_decode(DB::table('users')->where('id', $id)->first()->money)->balance;
  }
}