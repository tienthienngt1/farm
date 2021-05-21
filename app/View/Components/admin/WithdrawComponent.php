<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class WithdrawComponent extends Component
{
  public $withdraw;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($withdraw) {
    $this->withdraw = $withdraw;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.withdraw-component');
  }
}