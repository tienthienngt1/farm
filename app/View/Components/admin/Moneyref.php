<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class Moneyref extends Component
{
  public $ref;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($ref) {
    $this->ref = $ref;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.moneyref');
  }
}