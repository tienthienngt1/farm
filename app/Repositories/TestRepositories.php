<?php

namespace App\Repositories;

use DB;

class TestRepositories 
{
  public function getFarm(){
    return DB::table('vetgetables')->get();
  }
}