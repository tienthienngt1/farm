<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\GetAllRepositories;
use Carbon\Carbon;
use Session;

class PetWarehouseController extends Controller
{

  use GetAllRepositories;

  public function redirect() {
    return redirect('home/pet');
  }

  public function index() {
    return view('home.petWarehouse');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    if ($this->getPetBag()->statusPet !== null) {
      session::flash('notifyError', 'Bạn đang nuôi con vật khác rồi!');
      return $this->redirect();
    }
    $id = $request->__id;

    $gettime = get_headers("https://google.com")[3];
    $gethour = explode(' ', $gettime)[5];
    $D = (int)explode(' ', $gettime)[2];
    $M = 5;
    $Y = (int)explode(' ', $gettime)[4];
    $h = (int)explode(':', $gethour)[0] + 7;
    $m = (int)explode(':', $gethour)[1];
    $s = (int)explode(':', $gethour)[2];
    $timeint = mktime($h, $m, $s, $M, $D, $Y);
    $time = date("Y-m-d H:i:s", $timeint);
    $addtime = date("Y-m-d H:i:s", strtotime('+'.$this->getRecordPet($id)->time.' hour', $timeint));

    $data = [
      'bag->pet->statusPet' => $id,
      'bag->pet->timePet' => $addtime,
    ];

    $this->updateUser($data);

    session::flash('notify', 'Nuôi '.$request->__name.' thành công!');

    return $this->redirect();
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
}