<?php

namespace App\Http\Controllers\home\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\home\refferal\QueryRefferal;
use App\Http\Repositories\GetUserRepositories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB, Auth, Session;

class SettingController extends Controller
{
  use QueryRefferal,
  GetUserRepositories;

  public function redirect() {
    return redirect('/home/setting');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    return view('home.setting.index');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    if (isset($_POST['changePass'])) {
      $this->validator($request->all())->validate();
      if (!Hash::check($request->oldPassword, $this->getUser()->password)) {
        Session::flash('notifyError', ' Mật khẩu cũ không chính xác');
        return back();
      }
      $this->updateUser(['password' => Hash::make($request->newPassword)]);
      Session::flash('notify', ' Thay đổi mật khẩu thành công');
      return back();
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    $arr = ['1',
      '2',
      '3',
      '4',
      '5'];
    if (!in_array($id, $arr)) {
      return $this->redirect ();
    }
    $withdraw = DB::table('withdraws')->where('user_id', $this->getID())->orderByDesc('created_at')->get();
    $ref = $this->getRefbuy();
    $level = DB::table('level')->get();
    $deposit = DB::table('deposits')->where('user_id', $this->getID())->orderBy('id', 'desc')->get();
    return view('home.setting.index', [
      'id' => $id,
      'ref' => $ref,
      'withdraw' => $withdraw,
      'level' => $level,
      'deposit' => $deposit
    ]);
  }

  public function update(Request $request, $id) {}

  public function destroy($id) {}


  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data) {
    $mess = [
      'newPassword.min' => 'Mật khẩu phải ít nhất 8 kí tự',
      'oldPassword.confirmed' => 'Mật khẩu không trùng nhau',
    ];
    return Validator::make($data, [
      'newPassword' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
      'oldPassword' => ['bail', 'required'],
    ], $mess);
  }

}