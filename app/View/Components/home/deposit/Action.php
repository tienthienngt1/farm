<?php

namespace App\View\Components\home\deposit;

use Illuminate\View\Component;

class Action extends Component
{
  public $deposit;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($deposit) {
    $this->deposit = $deposit;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.deposit.action');
  }
}