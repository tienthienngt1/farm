<?php

namespace App\Listeners\Auth;

use App\Events\Auth\BuyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;
use App\Http\Repositories\home\refferal\QueryRefferal;
use App\Http\Repositories\GetUserRepositories;
use Session, DB;

class BuyListener
{
  use QueryRefferal,
  GetUserRepositories;
  /**
  * Handle the event.
  * @param  Buyevent  $event
  * @return void
  */
  public function handle($event) {
    $userId = $this->getIdUser()->ref_id;
    if ($userId === null) {
      return;
    }
    $addMoney = rand($event->cost*0.1, $event->cost*0.15)/10;
    $arrMoney = json_decode($this->getUser()->money, true);
    $oldMoney = json_decode($this->getOrtherUser($userId)->money, true);
    $sumMoney = $addMoney + $arrMoney['referal'];
    $moneyRef = json_decode($this->getUser()->money)->referal;

    $data = [
      'money' => json_encode(array_merge($oldMoney, [
        'referal' => $sumMoney + json_decode($this->getOrtherUser($userId)->money)->referal,
        'balance' => json_decode($this->getOrtherUser($userId)->money)->balance + $addMoney,
      ]))];

    $this->updateOrtherUser($userId, $data);

    $data = [
      'user_id' => $this->getID(),
      'ref_id' => $userId,
      'name' => $event->request->name,
      'money' => $sumMoney,
    ];

    $this->updateRefbuy($data);

  }
}