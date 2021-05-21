<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    if (Auth::user()) {
      if ((int)json_decode(Auth::user()->role)->auth === 2) {
        Auth::logout();
      }
    }
    return view('home.home');
  }

  public function viewBag() {
    return view('home.bag');
  }
}