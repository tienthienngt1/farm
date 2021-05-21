<?php

namespace App\View\Components\home;

use Illuminate\View\Component;

class DesktopFarmComponent extends Component
{
  public $data;
  public function __construct($data) {
    $this->data = $data;
  }

  public function render() {
    return view('components.home.desktop-farm-component');
  }
}