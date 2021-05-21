<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class CatComponent extends Component
{
  public $cats;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($cats) {
    $this->cats = $cats;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.cat-component');
  }
}