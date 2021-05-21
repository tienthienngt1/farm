<?php

namespace App\View\Components\home\launchpad;

use Illuminate\View\Component;

class Detail extends Component
{
  public $buytoken;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($buytoken) {
    $this->buytoken = $buytoken;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.launchpad.detail');
  }
}