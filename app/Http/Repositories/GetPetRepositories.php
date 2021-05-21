<?php

namespace App\Http\Repositories;

use App\Http\Repositories\GetUserRepositories;
use DB;

trait GetPetRepositories
{

  use GetUserRepositories;

  public function getPet() {
    return DB::table('pet')->get();
  }

  public function getRecordPet($id) {
    return DB::table('pet')->where('id', $id)->first();
  }

  public function getPetBag() {
    return json_decode($this->getUser()->bag)->pet;
  }

  public function getLevel($exp) {
    $getLevel = DB::table('level')->where('exp', '<=', (int)$exp)->orderBy('id', 'desc')->first();
    if (!isset($getLevel->id)) {
      return 0;
    }
    return $getLevel->id;
  }


}