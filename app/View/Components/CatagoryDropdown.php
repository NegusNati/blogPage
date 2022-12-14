<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Catagory;

class CatagoryDropdown extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.catagory-dropdown',
            ['catagories' => Catagory::all(),
            'currentCatagory' => Catagory::firstWhere('slug', request('catagory'))],

        );
    }
}
