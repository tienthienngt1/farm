<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\GetAllRepositories;

class GetVetComposer
{
  use GetAllRepositories;
  
  public function compose(View $view){
    $view->with('getVet',$this->getVet());
  }
  
}