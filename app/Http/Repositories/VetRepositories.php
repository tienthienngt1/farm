<?php

namespace App\Http\Repositories;

use DB;

class VetRepositories 
{
  
  protected $getVet = null;
  
  public function __construct()
  {
    $this->getVet = DB::table('vetgetables')->get();
  }
  
  public function getVet()
  {
    return $this->getVet;
  }
  
}