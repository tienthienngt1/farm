<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class UserComponent extends Component
{
  public $users;
  /**
  * Create a new component instance.
  *
  * @return void
  */
  public function __construct($users) {
    $this->users = $users;
  }

  /**
  * Get the view / contents that represent the component.
  *
  * @return \Illuminate\Contracts\View\View|string
  */
  public function render() {
    return view('components.admin.user-component');
  }
}