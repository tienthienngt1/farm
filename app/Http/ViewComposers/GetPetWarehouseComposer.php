<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\GetPetRepositories;

class GetPetWarehouseComposer
{
  use GetPetRepositories;
  
  public function compose(View $view){
    $view->with('getPetBag',$this->getPetBag());
  }
  
}