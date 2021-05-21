<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class Balance extends Component
{
  public $balance;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($balance) {
    $this->balance = $balance;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.balance');
  }
}