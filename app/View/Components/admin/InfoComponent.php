<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class InfoComponent extends Component
{
  public $info;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($info) {
    $this->info = $info;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.info-component');
  }
}