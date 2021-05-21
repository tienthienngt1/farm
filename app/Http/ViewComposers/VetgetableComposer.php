<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\TestRepositories;
use DB;

class VetgetableComposer
{
  public $getVet = [];
  
  public function __construct(TestRepositories $Test){
    $this->getVet = $Test->getFarm();
  }
  
  public function compose(View $view){
    $view->with('getVet',$this->getVet);
  }
  
}