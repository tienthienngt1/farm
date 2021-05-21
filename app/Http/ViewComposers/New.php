<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;

class New
{

  public function compose(View $view) {
    $new = DB::table('news')->where('status', 1)->first();
    $view->with('news', $new);
  }
}