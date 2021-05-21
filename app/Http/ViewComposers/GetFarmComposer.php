<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\GetAllRepositories;

class GetFarmComposer
{
  use GetAllRepositories;
  
  public function compose(View $view){
    
    $view->with('getFarm',$this->getFarm());
    
  }
  
}