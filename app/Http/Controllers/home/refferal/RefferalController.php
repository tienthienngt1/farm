<?php

namespace App\Http\Controllers\home\refferal;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Repositories\home\refferal\QueryRefferal;
use App\Http\Repositories\GetUserRepositories;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Session, Auth;

class RefferalController extends Controller
{
  use QueryRefferal,
  GetUserRepositories;

  /**
  * @return redirect to index page of refferal
  */
  protected function redirect() {
    return redirect('home/refferal');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  protected function index() {
    $ref = User::find(Auth::user()->id)->refferal;
    $refbuy = $this->getRefbuyRegister();
    return view('home.refferal.index', ['ref' => $ref, 'refbuy' => $refbuy]);
  }

  /**
  * Get balance user
  */
  protected function getBalance() {
    return json_decode($this->getUser()->money)->balance;
  }

  protected function getMoneyRefferal() {
    return json_decode($this->getUser()->money)->referal;
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  protected function store(Request $request) {
    if (isset($_POST['submitRef'])) {
      $this->submitRef($request);
    }

    if (isset($_POST['reward'])) {
      $this->reward($request);
    }
    return $this->redirect();
  }

  /**
  * Handle reward refferal
  * @return
  */
  protected function reward($request) {
    $getMoneyRef = $this->getIdUser()->money;

    if ((int)$getMoneyRef < 350) {
      return;
    }

    if ($this->getIdUser()->ref_status === 1) {

      $oldMoney = json_decode($this->getUser()->money, true);
      $data = array_merge($oldMoney, [
        'referal' => $this->getMoneyRefferal() + $getMoneyRef,
        'balance' => $this->getBalance() + $getMoneyRef,
      ]);

      //Addition money into balance
      $this->updateUser([
        'money' => json_encode($data),
      ]);

      // Minus money from refferal
      $this->updateRefStatus([
        'ref_status' => 2,
      ]);

      Session::flash('notify', 'Bạn nhận được '.$getMoneyRef. 'TH từ nhiệm vụ giới thiệu.');
    }

    return;
  }

  /**
  * Insert code refferal
  * @param Request
  * @return
  */
  protected function submitRef($request) {
  
    if (empty($this->getRefferal($request))) {
      session::flash('notifyError', 'Mã giới thiêụ không tồn tại');
      return;
    }
    if ($request->ref === $this->getIdUser()->refferal) {
      session::flash('notifyError', ' Không được nhập mã mời của bạn');
      return;
    }

    if ((int)$this->getIdUser()->ref_status === 0) {

      $add = 0;
      $user_id = $this->getRefferal($request)->user_id;
      $money = rand(230, 250);
      
      // addition refferal money when register
      if ($this->getRefferal($request)->money) {
        $add = $this->addBalance($request, $user_id);
      }

      // insert to refferal table
      $this->updateRefStatus([
        'ref_id' => $user_id,
        'ref_status' => 1,
        'money' => $money,
      ]);

      // insert to refbuys table
      $data = [
        'user_id' => $this->getID(),
        'ref_id' => $user_id,
        'name' => 1,
        'money' => $add,
      ];
      $this->updateRefbuy($data);

      //show notify
      session::flash('notify', 'Chúc mừng bạn nhận được '.$money.'TH. Bạn hãy giới thiệu thêm nhiều người nữa để kiếm thêm tiền nhé!');
    }

    return;
  }

  /**
  * Addition balance ref when registered,
  * @param request, id,
  * @return The money is added.
  */
  protected function addBalance(Request $request, $id) {
    if ((int)$this->getIdRef($id)->ref_status === 2) {
      return 0;
    }
    $money = $this->getRefferal($request)->money;
    $gift = rand(300, 500)/1000;
    $add = $money + $gift;
    if ($money === null) {
      return null;
    }
    $this->updateRefUser($id, [
      'money' => (float)$add,
    ]);
    return $gift;
  }

}