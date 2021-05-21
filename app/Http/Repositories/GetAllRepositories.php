<?php 

namespace App\Http\Repositories;

use App\Http\Repositories\GetVetRepositories;
use App\Http\Repositories\GetFarmRepositories;
use App\Http\Repositories\GetUserRepositories;
use App\Http\Repositories\GetBagRepositories;
use App\Http\Repositories\GetMoneyRepositories;
use App\Http\Repositories\GetPetRepositories;

trait GetAllRepositories
{
  
  use GetVetRepositories, GetFarmRepositories, GetUserRepositories , GetBagRepositories, GetMoneyRepositories, GetPetRepositories;
  
}