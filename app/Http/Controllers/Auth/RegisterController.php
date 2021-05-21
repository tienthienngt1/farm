<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Http\Repositories\GetUserRepositories;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers,
  GetUserRepositories;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct() {
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data) {
    $mess = [
      'name.regex' => ' Họ và tên chỉ được chứa chữ cái và khoảng trắng',
      'name.max' => ' Họ và tên không được quá 255 kí tự',
      'password.min' => 'Mật khẩu phải ít nhất 8 kí tự',
      'password.confirmed' => 'Mật khẩu không trùng nhau',
      'email.unique' => 'Email này đã tồn tại'
    ];
    return Validator::make($data, [
      'name' => ['bail', 'required', 'max:255', 'regex:/^[a-zA-Z\s]*$/'],
      'email' => ['bail', 'required', 'email', 'max:255', 'unique:users'],
      'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
    ], $mess);
  }
  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\Models\User
  */
  protected function create(array $data, $request) {
    if (strtolower($request-> name) === 'admin') {
      Session::flash('notifyError', 'Bạn không có quyền chọn tên Admin');
      return null;
    }
    if ($this->getIp($request->ip()) === null) {
      return User::create([
        'ip' => $request->ip(),
        'phone' => $_SERVER['HTTP_USER_AGENT'],
        'name' => strtoupper(addslashes(trim($data['name']))),
        'email' => addslashes(trim($data['email'])),
        'password' => Hash::make($data['password']),
        'level' => 0,
        'exp' => 0,
        'role' => json_encode(['auth' => 1, 'levelFarm' => 1, 'levelPet' => 1, 'roleForum' => 1,
        ]),
        'bag' => json_encode([
          'vet' => ['1' => null, '2' => null, '3' => null, '4' => null, '5' => null, '6' => null, '7' => null, '8' => null],
          'pet' => ['statusPet' => null, 'timePet' => null],
        ]),
        'money' => json_encode([
          'balance' => 0,
          'pending' => 0,
          'withdraw' => 0,
          'referal' => 0,
        ]),
        'farm' => json_encode(['farm1s' => ['field1' => null, 'field2' => null, 'field3' => null, 'field4' => null, 'field1Time' => null, 'field2Time' => null, 'field3Time' => null, 'field4Time' => null,
        ], 'farm2s' => ['field5' => null, 'field6' => null, 'field7' => null, 'field8' => null, 'field5Time' => null, 'field6Time' => null, 'field7Time' => null, 'field8Time' => null,], 'farm2sRole' => ['field5' => null, 'field6' => null, 'field7' => null, 'field8' => null,]
        ]),
      ]);
    }
    session()->flash('notifyError', 'Bạn không được đăng kí nhiều tài khoản trên cùng một thiết bị để tránh việc lạm dụng tài khoản. Xin cảm ơn!');
    return null;
  }
}