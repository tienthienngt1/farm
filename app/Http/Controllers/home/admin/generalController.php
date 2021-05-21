<?php

namespace App\Http\Controllers\home\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Refferal;
use DB, Session;

class generalController extends Controller
{
  /**
  * Display site graphical
  */
  public function index() {
    //Get data user from users database
    $user = $this->user();
    //Get info data from database;
    $info = $this->info();
    //Get withdraw list
    $withdraw = $this->withdraw ();
    //Get categories
    $cat = $this->categories();
    //get new
    $new = DB::table('news')->get();

    return view('admin/index', [
      'users' => $user,
      'info' => $info,
      'withdraw' => $withdraw,
      'cat' => $cat,
      'new' => $new
    ]);
  }

  //function return $user;
  private function user() {
    return DB::table('users')->orderBy('created_at', 'desc')->paginate(50, '*', 'user');
  }

  //function return $info
  private function info() {
    return \App\Models\home\Info::orderBy('created_at', 'desc') -> paginate(50, '*', 'inf');
  }

  //function return $withdraw
  protected function withdraw () {
    return \App\Models\home\Withdraw::orderBy('created_at', 'desc') -> paginate(20, '*', 'with');
  }

  //function return $cat
  protected function categories() {
    return \App\Models\Categories::orderBy('created_at', 'desc')->paginate(20, '*', 'cat');
  }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    if ($request->withdraw) {
      $this->handleWithdraw($request);
      return back();
    }
    
    if ($request->denywithdraw) {
      $this->handledenyWithdraw($request);
      return back();
    }

    if ($request->category) {
      $this->handleCategory($request);
      return back();
    }

    if ($request->new) {
      $this->handleNew($request);
      return back();
    }

    if ($request->banned) {
      $this->handleBanned($request);
      return back();
    }

    if ($request->changeInfo) {
      $this->changeInfo($request);
      return back();
    }

    if ($request->turnOn) {
      if ($request->_status == 0) {
        DB::table('news')->where('id', $request->_id)->update(['status' => 1]);
      } else {
        DB::table('news')->where('id', $request->_id)->update(['status' => 0]);
      }
      return back();
    }
    
    if($request->_search){
      $search = DB::table('users')->where('email','like','%'.$request->_email.'%')->get();
      dd($search);
    }
    if($request->_searchRef){
      $search = DB::table('refferals')->where('refferal','like','%'.$request->_email.'%')->get();
      dd($search);
    }
    
    if($request->_findRef){
     $find = Refferal::where('ref_id',$request->_ref)->get();
     foreach($find as $f){
       echo $f->user->phone."<br>";
     }
    }
  }

  //return handleWithdraw
  protected function handleWithdraw($request) {
    //get money mount database
    $getMoneyDb = \App\Models\User::find($request->_id);
    $old = json_decode($getMoneyDb->money, true);
    $withdrawMoney = json_decode($getMoneyDb->money)->withdraw;
    $pendingMoney = json_decode($getMoneyDb->money)->pending;

    $data = array_merge($old, [
      'withdraw' => $withdrawMoney + $request->_money,
      'pending' => $pendingMoney - $request->_money,
    ]);

    DB::table('withdraws')->where('hash', $request->_hash)->update(['status' => 1]);
    \App\Models\User::where('id', $request->_id)->update(['money' => json_encode($data), 'role->roleForum' => 2]);
    session::flash('notify', 'ok');
  }

  //refurn handledenyWithdraw
  protected function handledenyWithdraw($request) {
    $getMoneyDb = \App\Models\User::find($request->_id);
    $old = json_decode($getMoneyDb->money, true);
    $withdrawMoney = json_decode($getMoneyDb->money)->pending;
    $balanceMoney = json_decode($getMoneyDb->money)->balance;
    $data = array_merge($old, [
      'pending' => $withdrawMoney - $request->_money,
      'balance' => $balanceMoney + $request->_money,
    ]);
    \App\Models\User::where('id', $request->_id)->update(['money' => json_encode($data)]);

    DB::table('withdraws')->where('hash', $request->_hash)->update(['status' => 2]);
    session::flash('notify', 'deny successful');
  }
  
  //return function handleCategory
  protected function handleCategory($request) {
    DB::table('categories')->where('hash', $request->_hash)->delete();
    DB::table('comments')->where('id_category', $request->_id)->delete();
    session::flash('notify', 'delete successfully');
  }

  //return function ban
  protected function handleNew($request) {
    DB::table('news')->insert(['tittle' => $request->tittle, 'content' => $request->content, 'status' => 0]);
    session::flash('notify', 'create successful');
  }

  //return function banned
  protected function handleBanned($request) {
    //get money mount database
    $getDB = \App\Models\User::find($request->_id);
    $old = json_decode($getDB->role, true);

    $data = array_merge($old, [
      'auth' => 2,
    ]);
    \App\Models\User::where('id', $request->_id)->update(['role' => json_encode($data)]);
    session::flash('notify', 'Banned successfully');
  }

  //return function changeInfo
  protected function changeInfo($request) {
    DB::table('infos')->where('id', $request->_id)->update(['role' => 0]);
    session::flash('notify', 'change info successful');
  }
}