<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB, Auth;
class VerifyAdmin
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle(Request $request, Closure $next) {
    if (Auth::user() !== null) {
      $getRecord = DB::table('users')->where('id', Auth::user()->id)->first();
      $getRole = json_decode($getRecord->role)->auth;
      if ($getRole === 0) {
        return $next($request);
      }
    }
    return redirect('/home');
  }
}