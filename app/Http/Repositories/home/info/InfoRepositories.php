<?php

namespace App\Http\Repositories\home\info;

use App\Models\home\Info;
use Auth;

trait InfoRepositories
{
  protected function getID()
  {
    return Auth::user()->id;
  }
  
  protected function getInfoUser(){
    return Info::where('user_id',$this->getID())->first();
  }
  
  protected function insertInfo($data)
  {
    return Info::create($data);
  }
  
  protected function updateInfo($data)
  {
    return Info::where('user_id', $this->getID())->update($data);
  }
  
  protected function getInfoStk($stk)
  {
    return Info::where('stk', $stk)->first();
  }
}