<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;
use DB,Auth;

trait FarmRepositories
{
  use GetUserRepositories;
  
  public function __construct()
  {
    //
  }
  
  public function getFarm()
  {
    return json_decode($this->getUser(Auth::user()->id)->farm);
  }
  
  public function checkLevelFarm($id)
  {
    dd( json_decode($this->getUser(Auth::user()->id)->role) -> levelFarm);
    
    return json_decode($this->getUser(Auth::user()->id)->role->levelFarm);
  }
}