<?php

namespace App\View\Components\home\info;

use Illuminate\View\Component;

class EditInfo extends Component
{
    public $info;
    public function __construct($info)
    {
      $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home.info.edit-info');
    }
}
