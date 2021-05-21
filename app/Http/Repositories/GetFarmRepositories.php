<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;
use DB,Auth;

trait GetFarmRepositories
{
  use GetUserRepositories ;
  
  public function getFarm()
  {
    return json_decode($this->getUser()->farm);
  }
  
  public function getLevelFarm()
  {
    return json_decode($this->getUser(Auth::user()->id)->role)->levelFarm;
  }
  
  public function getField($id)
  {
    $field = 'field'.$id;
    return json_decode($this->getUser(Auth::user()->id)->farm)->farm1s->$field;
  }
  
  public function getFieldTime($id)
  {
    $field = 'field'.$id.'Time';
    return json_decode($this->getUser(Auth::user()->id)->farm)->farm1s->$field;
  }
  
  public function getBag()
  {
    return json_decode($this->getUser(Auth::user()->id)->bag);
  }
  
  
}