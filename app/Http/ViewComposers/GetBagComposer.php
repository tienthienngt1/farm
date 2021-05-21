<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;

use App\Http\Repositories\GetBagRepositories;

class GetBagComposer
{
  use GetBagRepositories;
  
  public function compose(View $view)
  {
    $view->with('bag', $this->getBagUser());
  }
}