<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class BannedComponent extends Component
{
  public $banned;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($banned) {
    $this->banned = $banned;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.banned-component');
  }
}