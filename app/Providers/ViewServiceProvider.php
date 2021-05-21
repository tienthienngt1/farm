<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
  /**
  * Register services.
  *
  * @return void
  */
  public function register() {
    //
  }

  /**
  *
  * @return void
  * Bootstrap services.
  */
  public function boot() {
    view::composer('*', 'App\Http\ViewComposers\GetUserComposer');
    view::composer(['home.farm', 'home.bag', 'home.shop'], 'App\Http\ViewComposers\GetVetComposer');
    view::composer('home.farm', 'App\Http\ViewComposers\GetFarmComposer');
    view::composer('home.bag', 'App\Http\ViewComposers\GetBagComposer');
    view::composer(['home.shop', 'home.petWarehouse', 'home.pet'], 'App\Http\ViewComposers\GetPetComposer');
    view::composer(['home.petWarehouse', 'home.pet'], 'App\Http\ViewComposers\GetPetWarehouseComposer');
    view::composer('*', 'App\Http\ViewComposers\GetNew');
  }
}