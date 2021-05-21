<?php

namespace App\Http\Repositories;

use DB;

trait GetVetRepositories 
{
 
  public function getVet()
  {
    return DB::table('vetgetables')->get();
  }
  
  public function getVetUser($levelFarm)
  {
    return DB::table('vetgetables')->where('id','<=',$levelFarm)->get();
  }
  
  public function getRecordVet($id)
  {
    return DB::table('vetgetables')->where('id',$id)->first();
  }

}