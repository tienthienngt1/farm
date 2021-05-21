<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repositories\VetRepositories;

class GetVetgetableComposer
{
  
  public $vet = null;
  
  public function __construct(VetRepositories $vet){
    $this->vet = $vet->getVet();
  }
  
  public function compose(View $view){
    $view->with('getVet',$this->vet);
  }
  
}