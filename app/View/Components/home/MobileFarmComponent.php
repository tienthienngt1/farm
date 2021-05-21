<?php

namespace App\View\Components\home;

use Illuminate\View\Component;

class MobileFarmComponent extends Component
{
  public $getFarm;
  public $getVet;
  public function __construct($getFarm, $getVet) {
    $this->getFarm = $getFarm;
    $this->getVet = $getVet;
  }

  public function render() {
    return view('components.home.mobile-farm-component');
  }
}