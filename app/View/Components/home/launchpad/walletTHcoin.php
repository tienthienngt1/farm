<?php

namespace App\View\Components\home\launchpad;

use Illuminate\View\Component;

class WalletTHcoin extends Component
{
  public $wallet;
  public $buytoken;
  public $buytokenref;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($wallet, $buytoken, $buytokenref) {
    $this->wallet = $wallet;
    $this->buytokenref = $buytokenref;
    $this->buytoken = $buytoken;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.launchpad.wallet');
  }
}