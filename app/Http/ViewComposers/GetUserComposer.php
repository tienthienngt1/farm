<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;

use App\Http\Repositories\GetUserRepositories;

class GetUserComposer
{
  use GetUserRepositories;

  public function compose(View $view) {

    $view->with('user', $this->getUser());
  }
}