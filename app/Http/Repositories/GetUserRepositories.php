<?php

namespace App\Http\Repositories;

use App\Models\User;
use DB,Auth;

trait GetUserRepositories
{
  public function getIp($ip)
  {
    return User::where('ip',$ip)->first();
  }
  
  public function getUser()
  {
    if(Auth::user() === null){
      return null;
    };
    return User::where('id',Auth::user()->id)->first();
  }
  
  protected function getOrtherUser($id)
  {
    return User::where('id',$id)->first();
  }
  
  public function updateUser($data)
  {
    return User::where('id',Auth::user()->id)->update($data);
  }
  
  protected function updateOrtherUser($id,$data)
  {
    return User::where('id',$id)->update($data);
  }
  
  protected function getRank($value)
  {
    if($value === 'level'){
      return User::orderByDesc('level')->take(50)->get();
    }
    return User::orderBy('role->'.$value, 'desc')->limit(50)->get();
  }
}