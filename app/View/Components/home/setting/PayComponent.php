<?php

namespace App\View\Components\home\setting;

use Illuminate\View\Component;

class PayComponent extends Component
{
  public $withdraw;
  public function __construct($withdraw) {
    $this->withdraw = $withdraw;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.setting.pay-component');
  }
}