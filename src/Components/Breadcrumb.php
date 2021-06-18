<?php

namespace SimaoCoutinho\Admin\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('admin::components.breadcrumb');
    }
}