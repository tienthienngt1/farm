<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;
use DB,Auth;

trait GetMoneyRepositories
{
  use GetUserRepositories;
  
  private function getMoneyUser()
  {
    return json_decode($this->getUser()->money);
  }
 
}