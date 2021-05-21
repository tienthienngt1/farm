<?php

namespace App\View\Components\home\partner;

use Illuminate\View\Component;

class ListPartner extends Component
{
  public $listpartner;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($listpartner) {
    $this->listpartner = $listpartner;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.partner.ListPartner');
  }
}