<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;

trait GetBagRepositories
{
  use GetUserRepositories, GetVetRepositories;
  
  public function GetBagUser()
  {
    return json_decode($this->getUser()->bag)->vet;
  }
  
  public function GetQuantityVetBag($id)
  {
    if(empty(json_decode($this->GetBagUser()->$id))){
    return null;
    }
      return json_decode($this->GetBagUser()->$id)->quantity;
  }
  
  public function GetIdVetBag($id)
  {
    if( !isset($this->GetBagUser()->$id)){
      return null;
    }
    return $this->GetBagUser()->$id;
  }
  
}