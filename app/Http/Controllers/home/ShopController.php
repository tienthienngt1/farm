<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use App\Events\Auth\BuyEvent;
use Session;

class ShopController extends Controller
{
  use GetAllRepositories;
  public function index() {
    return redirect('home/shop/1');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    if (!isset($_POST['buy'])) {
      return $this->index();
    }
    $balance = (int)$this->getMoneyUser()->balance;
    $level = null;

    $arrayRole = json_decode($this->getUser()->role, true);

    if ($request->id === "1") {

      $cost = $this->getRecordVet($arrayRole['levelFarm'] + 1)->cost;
      $b = ['levelFarm' => $arrayRole['levelFarm'] + 1];

      $level = json_decode($this->getUser()->role)->levelFarm;
    } else {

      $cost = $this->getRecordPet($arrayRole['levelPet'] + 1)->cost;
      $b = ['levelPet' => $arrayRole['levelPet'] + 1];

      $level = json_decode($this->getUser()->role)->levelPet;
    }

    if ($level === null) {
      return $this->index();
    }

    if ($balance < $cost) {
      Session::flash('notifyError', ' Bạn không đủ tiền trong tài khoản');
    } else {

      $c = array_replace($arrayRole, $b);
      $arrayMoney = json_decode($this->getUser()->money, true);
      $minusBalance = ['balance' => $balance - $cost];
      $d = array_replace($arrayMoney, $minusBalance);

      $data = [
        'money' => json_encode($d),
        'role' => json_encode($c)
      ];
      event(new BuyEvent($this->updateUser($data), $cost, $request));
      Session::flash('notify', 'Mở Khoá thành công, bạn nhận được ' . $request->name);
    }
    return redirect('home/shop/'.$request->id);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    return view('home.shop', ['id' => $id]);
  }

}