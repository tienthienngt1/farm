<?php

namespace App\View\Components\home\refferal;

use Illuminate\View\Component;

class InstructionComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.home.refferal.instruction-component');
    }
}
