<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;
use DB;

class GetNew
{
  public function getNew() {
    return DB::table('news')->get();
  }

  public function compose(View $view) {
    $view->with('new', $this->getNew());
  }
}