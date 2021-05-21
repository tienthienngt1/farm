<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\GetPetRepositories;

class GetPetComposer
{
  use GetPetRepositories;
  
  public function compose(View $view){
    $view->with('pet',$this->getPet());
  }
  
}