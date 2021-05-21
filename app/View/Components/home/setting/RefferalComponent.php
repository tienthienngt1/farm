<?php

namespace App\View\Components\home\setting;

use Illuminate\View\Component;

class RefferalComponent extends Component
{
  public $ref;
  public function __construct($ref) {
    $this->ref = $ref;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.setting.refferal-component');
  }
}