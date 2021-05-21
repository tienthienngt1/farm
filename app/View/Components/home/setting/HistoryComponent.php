<?php

namespace App\View\Components\home\setting;

use Illuminate\View\Component;

class HistoryComponent extends Component
{
  public $deposit;

  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($deposit) {
    $this->$deposit = $deposit;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.setting.history-component');
  }
}