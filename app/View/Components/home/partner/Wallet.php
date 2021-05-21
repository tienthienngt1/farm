<?php

namespace App\View\Components\home\partner;

use Illuminate\View\Component;

class Wallet extends Component
{
  public $wallet;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($wallet) {
    $this->wallet = $wallet;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.partner.Wallet');
  }
}