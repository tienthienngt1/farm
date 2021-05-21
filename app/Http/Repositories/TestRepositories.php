<?php

namespace App\Http\Repositories;
use Illuminate\Http\Request;

class TestRepositories {

  public function test() {
    echo "nguyen tien thien okkkk ";
  }
  
  public function getName(){
    return dd(Request);
  }
}
