<?php

namespace App\View\Components\home\setting;

use Illuminate\View\Component;

class LevelComponent extends Component
{
  public $level;
  public function __construct($level) {
    $this->level = $level;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.home.setting.level-component');
  }
}